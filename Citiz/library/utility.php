<?php

    abstract class Utility
    {
        static function sortBySVId() {
            return function ($a, $b){
                return $a->getSVId() > $b->getSVId();
            };
        }

        static function replaceDotByComma($string)
        {
            return preg_replace('/\./', ',', $string);
        }

        static function getDateFormatFR($date)
        {
            $date = new DateTime($date);
            return $date->format('d/m/Y');
        }
    }