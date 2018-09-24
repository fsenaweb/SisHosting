<?php

namespace App\Helpers;

use NumberFormatter;

class Helper
{

    /**
     * @param $number
     * @param $type
     * @return double
     */
    public static function formatNumber($number, $type)
    {
        if ($type == 'BR') {
            $value = number_format($number, 2, ",", ".");
            return $value;
        } elseif ($type == 'US') {
            $source = ['.', ','];
            $replace = ['', '.'];
            $value = str_replace($source, $replace, $number);
            return $value;
        }
    }

    public static function formatMouth($mouth)
    {
        switch ($mouth) {
            case 1:
                return "Janeiro";
                break;
            case 2:
                return "Fevereiro";
                break;
            case 3:
                return "Março";
                break;
            case 4:
                return "Abril";
                break;
            case 5:
                return "Maio";
                break;
            case 6:
                return "Junho";
                break;
            case 7:
                return "Julho";
                break;
            case 8:
                return "Agosto";
                break;
            case 9:
                return "Setembro";
                break;
            case 10:
                return "Outubro";
                break;
            case 11:
                return "Novembro";
                break;
            case 12:
                return "Dezembro";
                break;
        }
    }

}