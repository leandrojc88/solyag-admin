<?php

namespace App\Controller\Remesas\ConfigPais;

use App\Service\Remesas\ConfigPais\ListZonesByIdAndType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetListBySelectedConfig extends AbstractController
{
    /**
     * @Route("/remesas/config-paises/get-config-by-selected/{selectedZone}", name="remesas-config-paises-get-config-by-selected")
     */
    public function __invoke(
        Request $request,
        ListZonesByIdAndType $listZonesByIdAndType,
        $selectedZone
    ): JsonResponse {

        $id = $request->get('id');
        $list = $listZonesByIdAndType->__invoke($selectedZone, $id);

        return $this->json($list);
    }
}
