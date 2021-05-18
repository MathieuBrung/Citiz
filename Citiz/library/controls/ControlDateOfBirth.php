<?php

    abstract class ControlDateOfBirth
    {
        static function control($dob)
        {
            $dob = new DateTime($dob);
            $dob->add(new DateInterval('P18Y'));
            if($dob <= new DateTime())
            {
                return $dob;
            }
            return false;
        }
    }