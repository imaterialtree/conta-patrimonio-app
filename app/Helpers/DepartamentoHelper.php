<?php

namespace App\Helpers;

use App\Models\Departamento;

class DepartamentoHelper
{
    public static function getDepartamentoTitulo($departamentoId)
    {
        $departamento = Departamento::find($departamentoId);
        return $departamento ? $departamento->titulo : 'Desconhecido';
    }
}
