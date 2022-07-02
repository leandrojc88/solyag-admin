<?php

namespace App\Controller\Telecomunicaciones\Empresas;

use App\Entity\Telecomunicaciones\EmpresaTipoPaga;
use App\Entity\Telecomunicaciones\HistorialSaldoEmpresa;
use App\Repository\EmpresasRepository;
use App\Repository\Telecomunicaciones\EmpresaTipoPagaRepository;
use App\Service\Telecomunicaciones\Empresas\EmpresaTipoPagoService;
use App\Service\Telecomunicaciones\Empresas\RegisterSaldoToHostory;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UpdateSaldoEmpresaControlle extends AbstractController
{
    /**
     * @Route("/telecomunicaciones/update-saldo-empresa",name="tele_update_saldo_empresa")
     */
    public function updateTipoSaldoEmpresa(
        Request $request,
        EntityManagerInterface $em,
        EmpresaTipoPagaRepository $empresasTipoPagaRepository,
        RegisterSaldoToHostory $registerSaldoToHostory
    ): Response {

        $id = $request->get('id');
        $id_empresa = $request->get('id_empresa');
        $saldo = $request->get('saldo');
        $accion = $request->get('accion');

        $empresaTipoPaga = $empresasTipoPagaRepository->find($id);

        if ($accion == HistorialSaldoEmpresa::DISMINUIR) {

            if ($empresaTipoPaga->getSaldo() < $saldo) {
                $this->addFlash('error', "el saldo que desea disminuir es superior al de la empresa");
                return $this->redirectToRoute('telecomunicaciones-empresas');
            }

            $valor = $empresaTipoPaga->getSaldo() - $saldo;
            $msg = "Saldo disminuido";
        } else {
            $valor =  $empresaTipoPaga->getSaldo() + $saldo;
            $msg = "Saldo agregado";
        }

        $empresaTipoPaga->setSaldo($valor);


        $em->persist($empresaTipoPaga);
        $em->flush();

        ($registerSaldoToHostory)($id_empresa, $saldo, $accion);


        $this->addFlash('success', $msg);
        return $this->redirectToRoute('telecomunicaciones-empresas');
    }
}
