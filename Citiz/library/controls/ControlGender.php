<?php

    abstract class ControlGender
    {
        static function control($gender)
        {
            if($gender == 'Homme' || $gender == 'Femme')
            {
                return true;
            }
            return false;
        }
    }