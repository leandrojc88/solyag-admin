<?php

namespace App\Controller\Telecomunicaciones\Empresas;

use App\Entity\Telecomunicaciones\EmpresaSubservicioCubacel;
use App\Repository\EmpresasRepository;
use App\Repository\Telecomunicaciones\EmpresaSubservicioCubacelRepository;
use App\Repository\Telecomunicaciones\SubservicioRepository;
use App\Service\Telecomunicaciones\Subservicios\HttpUpdateCostoscSubserviciosCubacel;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UpdateCostoEmpresaCubacelController extends AbstractController
{
    /**
     * @Route("/update-costo-empresa-cubacel",name="update_costo_empresa_cubacel")
     */
    public function update(
        Request $request,
        EntityManagerInterface $em,
        EmpresasRepository $empresasRepository,
        SubservicioRepository $subservicioRepository,
        EmpresaSubservicioCubacelRepository $EmpresaSubservicioCubacelRepository,
        HttpUpdateCostoscSubserviciosCubacel $httpUpdateCostoscSubserviciosCubacel
    ): Response {

        // TODO pasarlo despues para un servicio de {aplicacion}

        $id_servicio = $request->get('id_servicio');
        $id_empresa = $request->get('id_empresa');
        $costo = $request->get('costo');

        $empresaCostoSolyag = $EmpresaSubservicioCubacelRepository->findOneBy([
            "id_empresa" => $id_empresa, "id_subservicio" => $id_servicio
        ]);

        if (!$empresaCostoSolyag) {
            $empresaCostoSolyag = new EmpresaSubservicioCubacel();

            $empresaCostoSolyag
                ->setCosto($costo)
                ->setActivo(true)
                ->setIdEmpresa($empresasRepository->find($id_empresa))
                ->setIdSubservicio($subservicioRepository->find($id_servicio));
        } else {
            $empresaCostoSolyag
                ->setCosto($costo);
        }

        $em->persist($empresaCostoSolyag);
        $em->flush();

        // enviar al api
        ($httpUpdateCostoscSubserviciosCubacel)(
            $id_empresa,
            $empresaCostoSolyag->getIdSubservicio()->getId(),
            $empresaCostoSolyag->getIdSubservicio()->getDescripcion(),
            $empresaCostoSolyag->getCosto()
        );

        $this->addFlash('success', 'Datos Actualizado ');
        return $this->redirectToRoute(
            'telecomunicaciones-empresas-subservicios-recarga-cubacel',
            ["id_empresa" => $id_empresa]
        );
    }
}
