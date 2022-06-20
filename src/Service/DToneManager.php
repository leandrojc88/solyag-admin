<?php

namespace App\Service;

use App\Entity\Telecomunicaciones\ServicioEmpresa;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Status;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class DToneManager
{

    private HttpClientInterface $client;
    private EntityManagerInterface $em;

    public const PRODUCT_ID = "product_id";
    public const VALUE = "value";
    public const PRODUCT_ID_RECARGA_CUBA_250CUP = [self::PRODUCT_ID => 35718, self::VALUE => 250];
    public const PRODUCT_ID_RECARGA_CUBA_500CUP = [self::PRODUCT_ID => 35719, self::VALUE => 500];
    public const PRODUCT_ID_RECARGA_CUBA_700CUP = [self::PRODUCT_ID => 35736, self::VALUE => 700];


    public const CALLBACK_URL = "/dtone/callback_url";

    public function __construct(
        HttpClientInterface $client,
        EntityManagerInterface $em
    ) {
        $this->client = $client;
        $this->em = $em;
    }

    public static function getProductIDbyValue($value)
    {
        switch ($value) {
            case self::PRODUCT_ID_RECARGA_CUBA_250CUP[self::VALUE]:
                return self::PRODUCT_ID_RECARGA_CUBA_250CUP[self::PRODUCT_ID];

            case self::PRODUCT_ID_RECARGA_CUBA_500CUP[self::VALUE]:
                return self::PRODUCT_ID_RECARGA_CUBA_500CUP[self::PRODUCT_ID];

            case self::PRODUCT_ID_RECARGA_CUBA_700CUP[self::VALUE]:
                return self::PRODUCT_ID_RECARGA_CUBA_700CUP[self::PRODUCT_ID];

            default:
                return false;
        }
    }

    public static function getValueByProductID($product_id)
    {
        switch ($product_id) {
            case self::PRODUCT_ID_RECARGA_CUBA_250CUP[self::PRODUCT_ID]:
                return self::PRODUCT_ID_RECARGA_CUBA_250CUP[self::VALUE];

            case self::PRODUCT_ID_RECARGA_CUBA_500CUP[self::PRODUCT_ID]:
                return self::PRODUCT_ID_RECARGA_CUBA_500CUP[self::VALUE];

            case self::PRODUCT_ID_RECARGA_CUBA_700CUP[self::PRODUCT_ID]:
                return self::PRODUCT_ID_RECARGA_CUBA_700CUP[self::VALUE];

            default:
                return false;
        }
    }

    /**
     * @param $param configuracion para la trasaccion
     * [
     *      id_trasaccion => id en solyag,
     *      first_name -> nombre del cliente,
     *      last_name => apellido cleinte,
     *      mobile_number => telefono cliente
     * ]
     */
    public function execTransactions($params)
    {

        $trasaccion = $params['id_trasaccion'];
        $last_name = $params['last_name'];
        $first_name = $params['first_name'];
        $mobile_number = $params['mobile_number'];
        $product_id = $params['product_id'];
        // $callback_url = $params['callback_url'];

        // try {
        //code...
        $response = $this->client->request(
            'POST',
            $_ENV['DTONE_API'] . 'async/transactions',
            [
                "headers" => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Basic ODNlOWZkZmYtNGQ0Yi00NDk0LWJiYjctOWI3ZGNiNDcwZTc2OjhjYjMwMTQ1LWUwZTctNDAwZS1iMTU0LWM0MmEwMjIyZTZiMQ==',
                ],
                "json" => [
                    "external_id" => $trasaccion, // id de la transaccion SOlyag
                    "product_id" => $product_id, // id del servicio en el API DTone
                    "auto_confirm" => true,
                    "beneficiary" => [
                        "last_name" => $last_name,
                        "first_name" =>  $first_name,
                        "nationality_country_iso_code" => "CUB",
                        "mobile_number" => $mobile_number,
                    ],
                    "credit_party_identifier" => [
                        "mobile_number" => $mobile_number
                    ],
                    "callback_url" => $_ENV['SITE_URL'] . self::CALLBACK_URL

                ]
            ]
        );

        if ($response->getStatusCode() > 299) {
            $this->updateDToneIntoServiceEmpresa(
                $trasaccion,
                null,
                null,
                Status::DECLINED,
                json_decode($response->getContent(false), true)
            );

            return json_decode($response->getContent(false));
        }

        $result = $response->toArray();

        $this->updateDToneIntoServiceEmpresa(
            $trasaccion,
            $result["id"],
            $result["confirmation_date"],
            $result["status"]["message"],
            $result
        );

        return $result;
    }

    public function updateDToneIntoServiceEmpresa($id_trasaccion, $id_proveedor, $fecha, $status, $json)
    {

        /** @var ServicioEmpresa $trasaccion */
        $trasaccion = $this->em->getRepository(ServicioEmpresa::class)->find($id_trasaccion);

        if (!$trasaccion)
            throw new Exception("No existe la transaccion en la bd `ServicioEmpresa`");

        // dd($json);
        $date = $fecha ? new \DateTime(explode(".", $fecha)[0] . '.000Z') : new DateTime();
        $trasaccion->setConfirmationDate($date);
        if ($id_proveedor) $trasaccion->setIdConfirProveedor($id_proveedor);
        $trasaccion->setStatus($status);
        $trasaccion->setResponse($json);

        $this->em->persist($trasaccion);
        $this->em->flush();
    }
}
