<?php

namespace App\Enums;

enum ClassificacaoEnum: string
{
    case NOVO = 'Novo';
    case EM_USO = 'Em Uso';
    case OCIOSO = 'Ocioso';
    case OCIOSO_BAIXA_UTILIZACAO = 'Ocioso de Baixa Utilização';
    case RECUPERAVEL = 'Recuperável';
    case ANTIECONOMICO = 'Antieconômico';
    case IRRECUPERAVEL = 'Irrecuperável';
    case ALIENADO = 'Alienado';
}
