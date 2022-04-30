<?php

namespace App\Util;

class UtilData
{
    public static function toSqlDate($unknowFormatDate, $flgIncludeTime = true)
    {
        if (trim($unknowFormatDate) == '')
            return '';
        $dateAux = explode(" ", $unknowFormatDate);
        $separador = strstr($dateAux[0], "/") ? "/" : "-";
        $dateAux2 = explode($separador, $dateAux[0]);

        if (strlen($dateAux2[0]) == 4) {
            $retorno = $dateAux2[0] . "-" . $dateAux2[1] . "-" . $dateAux2[2];
        } else {
            $retorno = $dateAux2[2] . "-" . $dateAux2[1] . "-" . $dateAux2[0];
        }

        if ($flgIncludeTime && isset($dateAux[1])) {
            $retorno .= " " . $dateAux[1];
        }
        return $retorno;
    }

    public static function formatarDataBR($unknowFormatDate = NULL)
    {
        if ($unknowFormatDate == '' || $unknowFormatDate == NULL)
            return '';
        $retorno = date('d/m/Y H:i', strtotime($unknowFormatDate));

        return $retorno;
    }

}
