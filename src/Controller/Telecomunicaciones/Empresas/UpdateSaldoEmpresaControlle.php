<?php

namespace App\Controller\Telecomunicaciones\Empresas;

use App\Entity\Telecomunicaciones\EmpresaTipoPaga;
use App\Repository\EmpresasRepository;
use App\Repository\Telecomunicaciones\EmpresaTipoPagaRepository;
use App\Service\Telecomunicaciones\Empresas\EmpresaTipoPagoService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UpdateSaldoEmpresaControlle extends AbstractController
{
    /**
     * @Route("/update-saldo-empresa",name="tele_update_saldo_empresa")
     */
    public function updateTipoSaldoEmpresa(
        Request $request,
        EntityManagerInterface $em,
        EmpresasRepository $empresasRepository,
        EmpresaTipoPagaRepository $empresasTipoPagaRepository,
        EmpresaTipoPagoService $empresasTipoPagaService
    ): Response {

        $id = $request->get('id');
        $id_empresa = $request->get('id_empresa');
        // $tipo = $request->get('tipo');
        $saldo = $request->get('saldo');

        $empresaTipoPaga = $empresasTipoPagaRepository->find($id);

        if (!$empresaTipoPaga) {
            $empresaTipoPaga = new EmpresaTipoPaga();

            $empresaTipoPaga
                // ->setTipo($empresasTipoPagaService->getTipoForCheckBox($tipo))
                ->setSaldo($saldo)
                ->setEmpresa($empresasRepository->find($id_empresa));
        } else {
            $empresaTipoPaga
                // ->setTipo($empresasTipoPagaService->getTipoForCheckBox($tipo))
                ->setSaldo($empresaTipoPaga->getSaldo() + $saldo);
        }

        $em->persist($empresaTipoPaga);
        $em->flush();

        $this->addFlash('success', 'Saldo asignado');
        return $this->redirectToRoute('telecomunicaciones-empresas');
    }
}
