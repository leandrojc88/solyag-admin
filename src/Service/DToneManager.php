<?php

namespace App\Service;

use App\Entity\Telecomunicaciones\ServicioEmpresa;
use App\Service\Telecomunicaciones\DTOne\UpdateDTOneApiForServiceEmpresa;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use App\Types\Status;
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

    public const CODE_ERROR = 400;
    public const CODE_OK = 200;

    public const CALLBACK_URL = "/api/dtone-callback-url";

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
        $response = $this->client->request(
            'POST',
            $_ENV['DTONE_API'] . 'async/transactions',
            [
                'auth_basic' => [$_ENV['DTONE_API_KEY'], $_ENV['DTONE_API_SECRET']],
                "headers" => [
                    'Content-Type' => 'application/json'
                    // 'Authorization' => 'Basic ODNlOWZkZmYtNGQ0Yi00NDk0LWJiYjctOWI3ZGNiNDcwZTc2OjhjYjMwMTQ1LWUwZTctNDAwZS1iMTU0LWM0MmEwMjIyZTZiMQ==',
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
            return [
                "statusCode" => self::CODE_ERROR,
                "response" => json_decode($response->getContent(false), true)
            ];
        }

        return [
            "statusCode" => self::CODE_OK,
            "response" => $response->toArray()
        ];
    }
}
