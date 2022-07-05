<?php

namespace App\Service\Telecomunicaciones\LargaDistancia;

use App\Types\ResponseLargaDistancia;
use SoapClient;

class SoapLargaDistancia
{

    public function __invoke($mAmount, $mTelephone)
    {
        if ($_ENV['LARGA_DISTANCIA_MODE'] == "prod")
            $this->execProdMode($mAmount, $mTelephone);
        else {
            $this->execDevMode($mAmount, $mTelephone);
        }
    }

    private function execDevMode($mAmount, $mTelephone): ResponseLargaDistancia
    {
        $wsdl_url = "http://www.virtualrg.com/wsapitelecomm/service1.asmx?WSDL";
        $client = new SOAPClient($wsdl_url);

        $params = array(
            'mCustomerID' => $_ENV['mCustomerID'],
            'mPassword' => $_ENV['mPassword'],
            'mAPIKey' =>  $_ENV['mAPIKey'],
            'mTelephone' => '13054004243',
            'mAmount' => $mAmount
        );

        $result = $client->Long_Distance_Recharge($params);

        return new ResponseLargaDistancia($result);

        // $result = $client->Long_Distance_Balance($params);

        // dd($result);
    }

    public function execProdMode($mAmount, $mTelephone): ResponseLargaDistancia
    {
        $wsdl_url = "http://www.virtualrg.com/wsapitelecomm/service1.asmx?WSDL";
        $client = new SOAPClient($wsdl_url);

        $params = array(
            'mCustomerID' => $_ENV['mCustomerID'],
            'mPassword' => $_ENV['mPassword'],
            'mAPIKey' =>  $_ENV['mAPIKey'],
            'mTelephone' => intval($mTelephone), //$mTelephone // que sea un entreto
            'mAmount' => $mAmount
        );

        $result = $client->Long_Distance_Recharge($params);

        return new ResponseLargaDistancia($result);

        // if ($result->mErrorMessage) {
        //     return ['result' => false, 'error' => $result->mErrorMessage];
        // }

        // $result->mAuthNo;
        // return ['result' => true, 'no_orden' => $result->mAuthNo];
    }
}
