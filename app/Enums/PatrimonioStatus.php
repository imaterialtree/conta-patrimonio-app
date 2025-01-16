<?php

namespace App\Enums;

enum PatrimonioStatus
{
    case LIDO;
    case NAO_LIDO;
    case NAO_ENCONTRADO;

    public function getClass(): string
    {
        return match ($this) {
            self::LIDO => 'table-success',
            self::NAO_ENCONTRADO => 'table-warning',
            self::NAO_LIDO => 'table-danger',
        };
    }
}
