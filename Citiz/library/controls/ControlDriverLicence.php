<?php

    abstract class ControlDriverLicence
    {
        static function controlNumber($number)
        {
            $regex = '%^[0-9]{1,15}$%';
            if(preg_match($regex, $number))
            {
                return true;
            }
            return false;
        }

        static function controlObtainingDate($obtainingDate, $dateOfbirth)
        {
            $dateOfbirth = new DateTime($dateOfbirth);
            $obtainingDate = new DateTime($obtainingDate);

            $dateOfbirth->add(new DateInterval('P18Y'));
            if($dateOfbirth <= $obtainingDate)
            {
                return true;
            }
            return false;
        }
    }