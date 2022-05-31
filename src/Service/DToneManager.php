<?php

namespace App\Service;

use Error;
use Exception;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class DToneManager
{

    private HttpClientInterface $client;

    public const PRODUCT_ID_RECARGA_CUBA = 35719;
    public const CALLBACK_URL = "/dtone/callback_url";

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
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
        // $callback_url = $params['callback_url'];

        // try {
        //code...
        $response = $this->client->request(
            'POST',
            // $_ENV['DTONE_API'] . 'async/transactions',
            "https://preprod-dvs-api.dtone.com/v1/async/transactions",
            [
                "headers" => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Basic ODNlOWZkZmYtNGQ0Yi00NDk0LWJiYjctOWI3ZGNiNDcwZTc2OjhjYjMwMTQ1LWUwZTctNDAwZS1iMTU0LWM0MmEwMjIyZTZiMQ==',

                ],
                "body" => [
                    "external_id" => "345435", // id de la transaccion SOlyag
                    "product_id" => 35719, // id del servicio en el API DTone
                    "auto_confirm" => true,
                    "beneficiary" => [
                        "last_name" => "string",
                        "first_name" =>  "string",
                        "nationality_country_iso_code" => "CUB",
                        "mobile_number" => "+5353443584",
                    ],
                    "credit_party_identifier" => [
                        "mobile_number" => "+5353443584"
                    ],
                    "callback_url" => "http://example.com" //$_ENV['SITE_URL'] . self::CALLBACK_URL
                    // "external_id" => $trasaccion, // id de la transaccion SOlyag
                    // "product_id" => self::PRODUCT_ID_RECARGA_CUBA, // id del servicio en el API DTone
                    // "auto_confirm" => true,
                    // "beneficiary" => [
                    //     "last_name" => $last_name,
                    //     "first_name" =>  $first_name,
                    //     "nationality_country_iso_code" => "CUB",
                    //     "mobile_number" => $mobile_number,
                    // ],
                    // "credit_party_identifier" => [
                    //     "mobile_number" => $mobile_number
                    // ],
                    // "callback_url" => $_ENV['SITE_URL'] . self::CALLBACK_URL

                ]
            ]
        );

        dd(444, $response);
        // } catch (Exception $e) {
        //     dd($e);
        // }
    }
}
