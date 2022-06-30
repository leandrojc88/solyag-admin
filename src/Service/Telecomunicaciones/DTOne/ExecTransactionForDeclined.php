<?php

namespace App\Service\Telecomunicaciones\DTOne;



use App\Entity\Telecomunicaciones\ServicioEmpresa;
use App\Http\httpPostServicioEmpresaCubacel;
use App\Repository\Telecomunicaciones\EmpresaSubservicioCubacelRepository;
use App\Repository\Telecomunicaciones\ServicioEmpresaRepository;
use App\Service\DToneManager;
use App\Service\Telecomunicaciones\Empresas\EmpresaTipoPagoService;
use App\Service\Telecomunicaciones\Empresas\ServicioEmpresaService;
use App\Types\Status;
use Exception;

class ExecTransactionForDeclined
{

    private ServicioEmpresaRepository $servicioEmpresaRepository;
    private DToneManager $dToneManager;
    private ServicioEmpresaService $servicioEmpresaService;
    private httpPostServicioEmpresaCubacel $httpPostServicioEmpresaCubacel;
    private UpdateDTOneApiForServiceEmpresa $updateDTOneApiForServiceEmpresa;
    private EmpresaTipoPagoService $empresaTipoPagoService;
    private EmpresaSubservicioCubacelRepository $empresaSubservicioCubacelRepository;


    public function __construct(
        ServicioEmpresaRepository $servicioEmpresaRepository,
        DToneManager $dToneManager,
        ServicioEmpresaService $servicioEmpresaService,
        httpPostServicioEmpresaCubacel $httpPostServicioEmpresaCubacel,
        UpdateDTOneApiForServiceEmpresa $updateDTOneApiForServiceEmpresa,
        EmpresaTipoPagoService $empresaTipoPagoService,
        EmpresaSubservicioCubacelRepository $empresaSubservicioCubacelRepository
    ) {
        $this->servicioEmpresaRepository = $servicioEmpresaRepository;
        $this->dToneManager = $dToneManager;
        $this->servicioEmpresaService = $servicioEmpresaService;
        $this->httpPostServicioEmpresaCubacel = $httpPostServicioEmpresaCubacel;
        $this->updateDTOneApiForServiceEmpresa = $updateDTOneApiForServiceEmpresa;
        $this->empresaTipoPagoService = $empresaTipoPagoService;
        $this->empresaSubservicioCubacelRepository = $empresaSubservicioCubacelRepository;
    }

    public function __invoke()
    {
        $serviciosInit = $this->servicioEmpresaRepository->findBy([
            "status" => Status::DECLINED,
        ]);

        $listServicios = [];

        foreach ($serviciosInit as $key => $item) {

            /** @var ServicioEmpresa $item */
            if (!$item->getSubServicio()->getIsDTOne()) continue;

            $isRedeclined = false;

            // re-ejecutar transaccion con otro id
            $return = $this->dToneManager->execTransactions([

                'id_trasaccion' => $item->getId() . "D",
                'last_name' => "SOLYAG",
                'first_name' => "SOLYAG",
                'mobile_number' => $item->getNoTelefono(),
                'product_id' => $item->getSubServicio()->getProductidDtone()

            ]);

            // dd($return, $item->getId() . "D");

            // actualizar ServicioEMrpesa con respuesta
            if ($return["statusCode"] == DToneManager::CODE_ERROR) {
                $isRedeclined = true;
                ($this->updateDTOneApiForServiceEmpresa)(
                    $item->getId(),
                    null,
                    null,
                    Status::RE_DECLINED,
                    $return["response"]
                );
            } else {
                $isRedeclined = $return["response"]["status"]["message"] == Status::DECLINED;
                ($this->updateDTOneApiForServiceEmpresa)(
                    $item->getId(),
                    $return["response"]["id"],
                    $return["response"]["confirmation_date"],
                    $return["response"]["status"]["message"] == Status::DECLINED
                        ? Status::RE_DECLINED
                        : $return["response"]["status"]["message"],
                    $return["response"]
                );
            }

            // si fue declinada por 2da vez retornar el dinero
            if ($isRedeclined) {
                $empresaSubservicioCubacel = $this->empresaSubservicioCubacelRepository->findOneBy([
                    "id_empresa" => $item->getEmpresa(),
                    "id_subservicio" => $item->getSubServicio()
                ]);

                if (!$empresaSubservicioCubacel)
                    throw new Exception("El subservicio " .  $item->getSubServicio()->getDescripcion() . " no tiene un costo configurado para la empresa " . $item->getEmpresa()->getNombre());


                $this->empresaTipoPagoService->reasignarSaldo(
                    $item->getEmpresa()->getId(),
                    $empresaSubservicioCubacel->getCosto()
                );
            }

            // enviar a solyag.online
            $listServicios = $this->servicioEmpresaService->prepareDataToSolyagApp($listServicios, $item);
        }
        if ($listServicios)
            $this->httpPostServicioEmpresaCubacel->update($listServicios);
    }
}
