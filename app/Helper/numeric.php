<?php

if (!function_exists('str_thousand')) {
    function str_thousand($number, $decimal_place = 0)
    {
        return number_format(floatval($number), $decimal_place, ',', '.');
    }
}


if (!function_exists('str_thousand_round')) {
    function str_thousand_round($number, $decimal_place = 0)
    {
        if ($decimal_place > 0) {
            $number = round($number, $decimal_place);
        }

        return number_format($number, $decimal_place, ',', '.');
    }
}


if (!function_exists('numeric_db')) {
    function numeric_db($str_number = 0)
    {
        if (!empty($str_number)) {
            $str_number = trim($str_number);
            $str_number = str_replace('.', '', $str_number);
            $str_number = str_replace(',', '.', $str_number);

            return $str_number;
        }

        return intval(0);
    }
}

if (!function_exists('numeric_indo')) {
    function numeric_indo($number)
    {
        $str_number = trim($number);
        $str_number = str_replace('.', ',', $str_number);

        return $str_number;
    }
}