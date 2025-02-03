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

    public static function fromId(int|string $id): self
    {
        return match ((int) $id) {
            1 => self::NOVO,
            2 => self::EM_USO,
            3 => self::OCIOSO,
            4 => self::OCIOSO_BAIXA_UTILIZACAO,
            5 => self::RECUPERAVEL,
            6 => self::ANTIECONOMICO,
            7 => self::IRRECUPERAVEL,
            8 => self::ALIENADO,
        };
    }

    public function getId(): int
    {
        return match ($this) {
            self::NOVO => 1,
            self::EM_USO => 2,
            self::OCIOSO => 3,
            self::OCIOSO_BAIXA_UTILIZACAO => 4,
            self::RECUPERAVEL => 5,
            self::ANTIECONOMICO => 6,
            self::IRRECUPERAVEL => 7,
            self::ALIENADO => 8,
        };
    }
}
