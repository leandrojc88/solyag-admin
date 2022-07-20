<?php

namespace App\Service\Telecomunicaciones\DTOne;

use App\Entity\Telecomunicaciones\RecargasCubacelManualToDTOne;
use App\Entity\Telecomunicaciones\ServicioEmpresa;
use App\Http\httpPostServicioEmpresaCubacel;
use App\Repository\Telecomunicaciones\RecargasCubacelManualToDTOneRepository;
use App\Repository\Telecomunicaciones\ServicioEmpresaRepository;
use App\Service\DToneManager;
use App\Service\Telecomunicaciones\Empresas\ServicioEmpresaService;
use App\Types\Status;
use Doctrine\ORM\EntityManagerInterface;

class ExecTransactionForManual
{
    private DToneManager $dToneManager;
    private ServicioEmpresaService $servicioEmpresaService;
    private httpPostServicioEmpresaCubacel $httpPostServicioEmpresaCubacel;
    private UpdateDTOneApiForServiceEmpresa $updateDTOneApiForServiceEmpresa;
    private RecargasCubacelManualToDTOneRepository $RecargasCubacelManualToDTOneRepository;
    private EntityManagerInterface $em;

    public function __construct(
        DToneManager $dToneManager,
        ServicioEmpresaService $servicioEmpresaService,
        httpPostServicioEmpresaCubacel $httpPostServicioEmpresaCubacel,
        UpdateDTOneApiForServiceEmpresa $updateDTOneApiForServiceEmpresa,
        RecargasCubacelManualToDTOneRepository $RecargasCubacelManualToDTOneRepository,
        EntityManagerInterface $em
    ) {
        $this->dToneManager = $dToneManager;
        $this->servicioEmpresaService = $servicioEmpresaService;
        $this->httpPostServicioEmpresaCubacel = $httpPostServicioEmpresaCubacel;
        $this->updateDTOneApiForServiceEmpresa = $updateDTOneApiForServiceEmpresa;
        $this->RecargasCubacelManualToDTOneRepository = $RecargasCubacelManualToDTOneRepository;
        $this->em = $em;
    }

    /**
     * RecargasCubacelManualToDTOne
     * + id_recarga
     * + productid_dtone
     * + date
     * + status = (INIT | DECLINED | RE_DECLINED | ...)
     */
    public function __invoke()
    {

        $serviciosManualToDTOne = $this->RecargasCubacelManualToDTOneRepository->findBy([
            "status" => Status::MANUAL_DTONE,
        ]);

        $listServicios = [];

        foreach ($serviciosManualToDTOne as $key => $item) {

            $recarga = $item->getRecarga();

            /** @var ServicioEmpresa $recarga */

            // ejecutar transaccion
            $return = $this->dToneManager->execTransactions([

                'id_trasaccion' => $recarga->getId(),
                'last_name' => "SOLYAG",
                'first_name' => "SOLYAG",
                'mobile_number' => $recarga->getNoTelefono(),
                'product_id' => $item->getProductidDtone()

            ]);

            // actualizar ServicioEMrpesa con respuesta
            if ($return["statusCode"] == DToneManager::CODE_ERROR) {
                $this->updateDTOneApiForServiceEmpresa->__invoke(
                    $recarga->getId(),
                    null,
                    null,
                    Status::DECLINED,
                    $return["response"]
                );
                $recarga->setStatus(Status::DECLINED);
                $item->setStatus(Status::DECLINED);
            } else {
                $this->updateDTOneApiForServiceEmpresa->__invoke(
                    $recarga->getId(),
                    $return["response"]["id"],
                    $return["response"]["confirmation_date"],
                    $return["response"]["status"]["message"],
                    $return["response"]
                );
                $recarga->setStatus($return["response"]["status"]["message"]);
                $item->setStatus($return["response"]["status"]["message"]);
            }

            $this->em->persist($recarga);
            $this->em->persist($item);
            $this->em->flush();

            // enviar a solyag.online
            $listServicios = $this->servicioEmpresaService->prepareDataToSolyagApp($listServicios, $recarga);
        }
        if ($listServicios)
            $this->httpPostServicioEmpresaCubacel->update($listServicios);
    }
}
