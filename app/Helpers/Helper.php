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

}