<?php

namespace App\Controller\Telecomunicaciones\Empresas;

use App\Entity\Telecomunicaciones\EmpresaTipoPaga;
use App\Repository\EmpresasRepository;
use App\Repository\Telecomunicaciones\EmpresaTipoPagaRepository;
use App\Service\Telecomunicaciones\Empresas\EmpresaTipoPagoService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UpdateTipoPagoEmpresaControlle extends AbstractController
{
    /**
     * @Route("/telecomunicaciones/update-tipo-pago-empresa/{empresa}",name="tele_update_tipo_pago_empresa")
     */
    public function updateTipoSaldoEmpresa(
        Request $request,
        EntityManagerInterface $em,
        EmpresasRepository $empresasRepository,
        EmpresaTipoPagaRepository $empresasTipoPagaRepository,
        $empresa
    ): JsonResponse {

        $tipo = !json_decode($request->get('tipo')) ? EmpresaTipoPaga::PREPAGO : EmpresaTipoPaga::POSPAGO;

        // dd($tipo);
        $empresaTipoPaga = $empresasTipoPagaRepository->findOneBy(["empresa" => $empresa]);

        if (!$empresaTipoPaga) {
            $empresaTipoPaga = new EmpresaTipoPaga();

            $empresaTipoPaga
                ->setTipo($tipo)
                ->setSaldo(0)
                ->setEmpresa($empresasRepository->find($empresa));
        } else {
            $empresaTipoPaga
                ->setTipo($tipo);
        }

        $em->persist($empresaTipoPaga);
        $em->flush();

        $this->addFlash('success', 'Tipo asignado');
        return $this->json(!json_decode($request->get('tipo')));
    }
}
