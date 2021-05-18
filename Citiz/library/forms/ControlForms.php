<?php

    abstract class ControlForms
    {
        static function controlFormsName()
        {
            $allowedFormName = [];
            $folders = scandir("library/forms/", 1);

            foreach($folders as $folder)
            {
                if(!preg_match("/.php/", $folder))
                {
                    $allowedFormName[] = $folder;
                }
            }
            return $allowedFormName;
        }
    }