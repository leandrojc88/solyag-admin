<?php

namespace App\Types\LargaDistancia;

use App\Types\Status;

class ResponseLargaDistancia
{
    private string $status;
    private string $result;
    private $responseOfLDAPi;

    public function __construct($responseOfLDAPi)
    {

        $this->responseOfLDAPi = $responseOfLDAPi;

        $this->maping();
    }

    public function maping()
    {
        if ($this->responseOfLDAPi->mErrorMessage) {
            $this->status = Status::DECLINED;
            $this->result = "error - " . $this->responseOfLDAPi->mErrorMessage;
        } else {

            $this->status = Status::COMPLETED;
            $this->result = $this->responseOfLDAPi->mAuthNo;
        }
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getResult(): string
    {
        return $this->result;
    }
}
