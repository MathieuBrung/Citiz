<?php

    abstract class ControlPostalCode
    {
        static function control($pc)
        {
            $regex = '%^[0-9]{5}$%';
            if(preg_match($regex, $pc))
            {
                return true;
            }
            return false;
        }
    }