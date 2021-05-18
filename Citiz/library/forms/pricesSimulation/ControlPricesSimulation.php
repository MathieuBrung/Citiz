<?php

    abstract class ControlPricesSimulation
    {
        static function controlVehicle($vehicleCategory)
        {
            $VCAllowed = array('S', 'M', 'L', 'XL', 'XXL');
            if(in_array($vehicleCategory, $VCAllowed))
            {
                return true;
            }
            return false;
        }

        static function controlDate($dateStart)
        {
            $now = new DateTime('now', new DateTimeZone('Europe/Paris'));
            $dateStart = new DateTime($dateStart, new DateTimeZone('Europe/Paris'));
            if($dateStart->format('d/m/Y') >= $now->format('d/m/Y'))
            {
                return true;
            }
            return false;
        }

        static function controlDistance($distance)
        {
            if($distance < 1000)
            {
                return true;
            }
            return false;
        }


    }