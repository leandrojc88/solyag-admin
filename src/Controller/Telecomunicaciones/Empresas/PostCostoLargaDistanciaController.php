<?php

namespace App\Controller\Telecomunicaciones\Empresas;

use App\Entity\Telecomunicaciones\EmpresaLargaDistancia;
use App\Repository\EmpresasRepository;
use App\Repository\Telecomunicaciones\EmpresaLargaDistanciaRepository;
use App\Service\Telecomunicaciones\LargaDistancia\HttpUpdateCostoLargaDistancia;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostCostoLargaDistanciaController extends AbstractController
{
    /**
     * @Route("/telecomunicaciones/post-costo-larga-distaincia", name="post_costo_larga_distancia")
     */
    public function update(
        Request $request,
        EntityManagerInterface $em,
        EmpresasRepository $empresasRepository,
        EmpresaLargaDistanciaRepository $empresaLargaDistanciaRepository,
        HttpUpdateCostoLargaDistancia $httpUpdateCostoLargaDistancia
    ): Response {

        // TODO pasarlo despues para un servicio de {aplicacion}

        $id_empresa = $request->get('id_empresa');
        $costo = $request->get('costo');

        $empresa = $empresasRepository->find($id_empresa);
        $empresaLargaDistancia = $empresaLargaDistanciaRepository->findOneBy([
            "empresa" => $id_empresa
        ]);

        if (!$empresaLargaDistancia) {
            $empresaLargaDistancia = new EmpresaLargaDistancia();

            $empresaLargaDistancia
                ->setCosto($costo)
                ->setActivo(true)
                ->setEmpresa($empresa);
        } else {
            $empresaLargaDistancia
                ->setCosto($costo);
        }

        $em->persist($empresaLargaDistancia);
        $em->flush();

        // enviar al api
        ($httpUpdateCostoLargaDistancia)(
            $id_empresa,
            $empresaLargaDistancia->getCosto()
        );

        $this->addFlash('success', 'Costo de Larga Distancia Actualizado ');
        return $this->redirectToRoute('telecomunicaciones-empresas');
    }
}
