<?php

    abstract class ControlIBAN
    {
        static function control($iban)
        {
            $regex = '%^[a-zA-Z]{2}[0-9]{12}[a-zA-Z0-9]{11}[0-9]{2}$%';
            if(preg_match($regex, $iban))
            {
                return true;
            }
            return false;
        }
    }