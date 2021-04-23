<?php

namespace App\Helper;

class Color {

    public static function green($string) {

        return str_replace(array('[',']'),array('<span>','</span>'), $string);

    }

    public static function blue($string) {

        return str_replace(array('(',')'),array('<span>','</span>'), $string);

    }

}