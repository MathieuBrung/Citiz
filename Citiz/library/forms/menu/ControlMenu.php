<?php

    abstract class ControlMenu
    {
        static function controlElements()
        {
            $allowedMenuElement = [];
            $files = scandir('controllers/', 1);
            foreach($files as $file)
            {
                if(preg_match("/View/", $file))
                {
                    $element = preg_replace("/.php/", "", $file);
                    $element = preg_replace("/controller/", "", $element);
                    $element = lcfirst($element);

                    $allowedMenuElement[] = $element;
                }
            }
            
            $allowedMenuElement[] = "logout";

            return $allowedMenuElement;
        }
    }