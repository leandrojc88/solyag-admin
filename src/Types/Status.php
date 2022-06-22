<?php

namespace App\Types;
class Status
{
    const INIT = 'INIT'; // el unico esta q es 100 de SOLYAG
    const CREATED = 'CREATED';
    const CONFIRMED = 'CONFIRMED';
    const REJECTED = 'REJECTED';
    const CANCELLED = 'CANCELLED';
    const SUBMITTED = 'SUBMITTED';
    const COMPLETED = 'COMPLETED';
    const REVERSED = 'REVERSED';
    const DECLINED = 'DECLINED';

    function acceptStatus(string $status)
    {
    }
}
