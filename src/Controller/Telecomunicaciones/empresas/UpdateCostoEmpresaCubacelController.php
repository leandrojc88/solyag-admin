<?php

namespace App\Controller\Telecomunicaciones\Empresas;

use App\Entity\Telecomunicaciones\EmpresaSubservicioSolyag;
use App\Entity\Telecomunicaciones\EmpresaTipoPaga;
use App\Repository\EmpresasRepository;
use App\Repository\Telecomunicaciones\EmpresaSubservicioSolyagRepository;
use App\Repository\Telecomunicaciones\EmpresaTipoPagaRepository;
use App\Repository\Telecomunicaciones\SubservicioRepository;
use App\Service\Telecomunicaciones\Empresas\EmpresaTipoPagoService;
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
        EmpresaSubservicioSolyagRepository $empresaSubservicioSolyagRepository
    ): Response {

        // TODO pasarlo despues para un servicio de {aplicacion}

        $id_servicio = $request->get('id_servicio');
        $id_empresa = $request->get('id_empresa');
        $costo = $request->get('costo');

        $empresaCostoSolyag = $empresaSubservicioSolyagRepository->findOneBy([
            "id_empresa" => $id_empresa, "id_subservicio" => $id_servicio
        ]);

        if (!$empresaCostoSolyag) {
            $empresaCostoSolyag = new EmpresaSubservicioSolyag();

            $empresaCostoSolyag
                ->setCosto($costo)
                ->setIdEmpresa($empresasRepository->find($id_empresa))
                ->setIdSubservicio($subservicioRepository->find($id_servicio));
        } else {
            $empresaCostoSolyag
                ->setCosto($costo);
        }

        $em->persist($empresaCostoSolyag);
        $em->flush();

        $this->addFlash('success', 'Datos Actualizado ');
        return $this->redirectToRoute(
            'telecomunicaciones-empresas-subservicios-recarga-cubacel',
            ["id_empresa" => $id_empresa]
        );
    }
}
