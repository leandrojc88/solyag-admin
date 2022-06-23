<?php

namespace App\Controller;

use App\Entity\Pais;
use App\Entity\Telecomunicaciones\EmpresaSubservicioCubacel;
use App\Entity\Telecomunicaciones\ServicioEmpresa;
use App\Http\httpPostServicioEmpresaCubacel;
use App\Repository\Telecomunicaciones\EmpresaSubservicioCubacelRepository;
use App\Repository\Telecomunicaciones\ServicioEmpresaRepository;
use App\Service\DToneManager;
use App\Service\Telecomunicaciones\Config\GetLoadIsActiveService;
use App\Service\Telecomunicaciones\Empresas\EmpresaTipoPagoService;
use App\Service\Telecomunicaciones\Empresas\ServicioEmpresaService;
use App\Service\Telecomunicaciones\Empresas\ValidateSaldoEmpresa;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Status;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Json;

/**
 * Class DToneController
 * @package App\Controller
 * @Route("/dtone")
 */
class DToneController extends AbstractController
{
    /**
     * @Route("/looptask", name="looptask")
     */
    public function looptask(
        ServicioEmpresaRepository $servicioEmpresaRepository,
        DToneManager $dToneManager,
        ServicioEmpresaService $servicioEmpresaService,
        httpPostServicioEmpresaCubacel $httpPostServicioEmpresaCubacel,
        EmpresaTipoPagoService $empresaTipoPagoService,
        GetLoadIsActiveService $getLoadIsActiveService,
        EmpresaSubservicioCubacelRepository $empresaSubservicioCubacelRepository,
        ValidateSaldoEmpresa $validateSaldoEmpresa
    ): JsonResponse {

        if (!$getLoadIsActiveService->get())
            return $this->json(["finish" => true, "msg" => "API DTone esta desactivada por el sistema"]);

        $serviciosInit = $servicioEmpresaRepository->findBy(["status" => Status::INIT]);

        /*
        [ id_empresa,
        servicios = [
                [ movimiento_venta, no_orden, status ], ...
            ]
        ]
        */
        $listServicios = [];

        foreach ($serviciosInit as $key => $item) {
            /** @var ServicioEmpresa $item */

            $empresaSubservicioCubacel = $empresaSubservicioCubacelRepository->findOneBy([
                "id_empresa" => $item->getEmpresa(),
                "id_subservicio" => $item->getSubServicio()
            ]);

            if (!$empresaSubservicioCubacel)
                throw new Exception("El subservicio " . $item->getSubServicio()->getDescripcion() . " no tiene un costo configurado para la empresa " . $item->getEmpresa()->getNombre());

            $costo = $empresaSubservicioCubacel->getCosto();

            if (!$validateSaldoEmpresa->validate($item->getEmpresa(), $item->getSubServicio())) {
                $dToneManager->updateDToneIntoServiceEmpresa(
                    $item->getId(),
                    null,
                    null,
                    Status::DECLINED,
                    ["errors" => [["code" => null, "message" => "Empresa sin saldo suficiente"]]]
                );
            } else {

                $dToneManager->execTransactions([

                    'id_trasaccion' => $item->getId(),
                    'last_name' => "SOLYAG",
                    'first_name' => "SOLYAG",
                    'mobile_number' => $item->getNoTelefono(),
                    'product_id' => $item->getSubServicio()->getProductidDtone()

                ]);

                $empresaTipoPagoService->reducirSaldo(
                    $item->getEmpresa()->getId(),
                    $costo
                );
            }

            $listServicios = $servicioEmpresaService->prepareDataToSolyagApp($listServicios, $item);
        }
        if ($listServicios)
            $httpPostServicioEmpresaCubacel->update($listServicios);

        return $this->json(["finish" => true]);
    }


    /**
     * @Route("/callback_url", name="callback_url", methods={"POST"})
     */
    public function callback_url(EntityManagerInterface $em, Request $request): JsonResponse
    {
        $pais = new Pais();
        $pais->setNombre(json_encode($request->request->all()));
        $pais->setActivo(true);

        $em->persist($pais);
        $em->flush();

        return $this->json('ok!');
    }
}
