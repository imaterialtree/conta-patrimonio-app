<?php

namespace App\Enums;

enum ContagemStatus: string
{
    case EM_ANDAMENTO = 'Em andamento';
    case FINALIZADO = 'Finalizado';
    case CANCELADO = 'Cancelado';
}
