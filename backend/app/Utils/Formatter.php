<?php

namespace App\Utils;

class Formatter
{
    public static function onlyDigits($string)
    {
        return preg_replace("/[^0-9]/", "", $string);
    }
}