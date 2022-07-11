<?php

namespace Logger\Helpers;

class DateHelper
{
    public static function isDate(string $str){
    $str = str_replace('/', '-', $str);
    return is_numeric(strtotime($str));
    }
}