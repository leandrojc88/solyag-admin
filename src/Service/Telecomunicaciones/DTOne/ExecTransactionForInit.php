<?php

namespace App\Service\Telecomunicaciones\DTOne;

use App\Entity\Telecomunicaciones\ServicioEmpresa;
use App\Http\httpPostServicioEmpresaCubacel;
use App\Repository\Telecomunicaciones\ServicioEmpresaRepository;
use App\Service\DToneManager;
use App\Service\Telecomunicaciones\Empresas\ServicioEmpresaService;
use App\Types\Status;

class ExecTransactionForInit
{

    private ServicioEmpresaRepository $servicioEmpresaRepository;
    private DToneManager $dToneManager;
    private ServicioEmpresaService $servicioEmpresaService;
    private httpPostServicioEmpresaCubacel $httpPostServicioEmpresaCubacel;
    private UpdateDTOneApiForServiceEmpresa $updateDTOneApiForServiceEmpresa;

    public function __construct(
        ServicioEmpresaRepository $servicioEmpresaRepository,
        DToneManager $dToneManager,
        ServicioEmpresaService $servicioEmpresaService,
        httpPostServicioEmpresaCubacel $httpPostServicioEmpresaCubacel,
        UpdateDTOneApiForServiceEmpresa $updateDTOneApiForServiceEmpresa
    ) {
        $this->servicioEmpresaRepository = $servicioEmpresaRepository;
        $this->dToneManager = $dToneManager;
        $this->servicioEmpresaService = $servicioEmpresaService;
        $this->httpPostServicioEmpresaCubacel = $httpPostServicioEmpresaCubacel;
        $this->updateDTOneApiForServiceEmpresa = $updateDTOneApiForServiceEmpresa;
    }

    public function __invoke()
    {
        $serviciosInit = $this->servicioEmpresaRepository->findBy([
            "status" => Status::INIT,
        ]);

        $listServicios = [];

        foreach ($serviciosInit as $key => $item) {

            /** @var ServicioEmpresa $item */
            if (!$item->getSubServicio()->getIsDTOne()) continue;

            // ejecutar transaccion
            $return = $this->dToneManager->execTransactions([

                'id_trasaccion' => $item->getId(),
                'last_name' => "SOLYAG",
                'first_name' => "SOLYAG",
                'mobile_number' => $item->getNoTelefono(),
                'product_id' => $item->getSubServicio()->getProductidDtone()

            ]);

            // actualizar ServicioEMrpesa con respuesta
            if ($return["statusCode"] == DToneManager::CODE_ERROR) ($this->updateDTOneApiForServiceEmpresa)(
                $item->getId(),
                null,
                null,
                Status::DECLINED,
                $return["response"]
            );
            else ($this->updateDTOneApiForServiceEmpresa)(
                $item->getId(),
                $return["response"]["id"],
                $return["response"]["confirmation_date"],
                $return["response"]["status"]["message"],
                $return["response"]
            );

            // enviar a solyag.online
            $listServicios = $this->servicioEmpresaService->prepareDataToSolyagApp($listServicios, $item);
        }
        if ($listServicios)
            $this->httpPostServicioEmpresaCubacel->update($listServicios);
    }
}
