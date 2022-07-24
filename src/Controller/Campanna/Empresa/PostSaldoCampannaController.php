<?php

namespace App\Controller\Campanna\Empresa;

use App\Entity\Campanna\CampannaConfig;
use App\Entity\Campanna\HistorySaldoCampanna;
use App\Repository\Campanna\CampannaConfigRepository;
use App\Repository\EmpresasRepository;
use App\Service\Campanna\Empresa\AutoCreateEmpresaCampannaConfig;
use App\Service\Campanna\Empresa\RegisterSaldoToHostory;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostSaldoCampannaController extends AbstractController
{
    /**
     * @Route("/campanna/post-saldo-campanna-sms", name="campanna-post-saldo-campanna-sms")
     */
    public function index(
        Request $request,
        EntityManagerInterface $em,
        CampannaConfigRepository $campannaConfigRepository,
        RegisterSaldoToHostory $registerSaldoToHostory
    ): Response {

        $id = $request->get('id');
        $id_empresa = $request->get('id_empresa');
        $saldo = $request->get('saldo');
        $accion = $request->get('accion');

        $campannaCOnfig = $campannaConfigRepository->find($id);

        // dd($campannaCOnfig, $request);

        if ($accion == HistorySaldoCampanna::DISMINUIR) {

            if ($campannaCOnfig->getSaldo() < $saldo) {
                $this->addFlash('error', "el saldo que desea disminuir es superior al de la empresa");
                return $this->redirectToRoute('telecomunicaciones-empresas');
            }

            $valor = $campannaCOnfig->getSaldo() - $saldo;
            $msg = "Saldo disminuido";
        } else {
            $valor =  $campannaCOnfig->getSaldo() + $saldo;
            $msg = "Saldo agregado";
        }

        $campannaCOnfig->setSaldo($valor);


        $em->persist($campannaCOnfig);
        $em->flush();

        $registerSaldoToHostory->__invoke($id_empresa, $saldo, $accion);


        $this->addFlash('success', $msg);
        return $this->redirectToRoute('campanna-config-empresas');
    }
}
