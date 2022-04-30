<?php

namespace App\Util;

class UtilString
{
    public static function limpaCPF_CNPJ($valor)
    {
        $valor = preg_replace('/[^0-9]/', '', $valor);
        return $valor;
    }
}
