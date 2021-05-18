<?php

    abstract class ControlCheckBox
    {
        static function control($checkBox)
        {
            if($checkBox == 'on')
            {
                return true;
            }
            return false;
        }
    }