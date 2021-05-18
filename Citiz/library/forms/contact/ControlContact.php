<?php

    abstract class ControlContact
    {
        const MESSAGELENGTHMIN = 100;

        static function controlMessage($message)
        {
            if(strlen($message) < self::MESSAGELENGTHMIN)
            {
                return false;
            }
            return true;
        }
    }