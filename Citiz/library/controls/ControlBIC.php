<?php

    abstract class ControlBIC
    {
        static function control($bic)
        {
            $regex = '%^[a-zA-Z0-9]{8,11}$%';
            if(preg_match($regex, $bic))
            {
                return true;
            }
            return false;
        }
    }