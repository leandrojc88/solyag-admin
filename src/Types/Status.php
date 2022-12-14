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
    const RE_DECLINED = 'RE_DECLINED';
    const DECLINED_SALDO = 'DECLINED_SALDO';
    const MANUAL_DTONE = 'MANUAL_DTONE';

    const toArray = [
        self::INIT,
        self::CREATED,
        self::CONFIRMED,
        self::REJECTED,
        self::CANCELLED,
        self::SUBMITTED,
        self::COMPLETED,
        self::REVERSED,
        self::DECLINED,
        self::RE_DECLINED,
        self::DECLINED_SALDO,
        self::MANUAL_DTONE
    ];
}
