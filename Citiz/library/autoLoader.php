<?php

    spl_autoload_register('Autoloader::autoloadDao');
    spl_autoload_register('Autoloader::autoloadDaoDB');
    spl_autoload_register('Autoloader::autoloadDto');
    spl_autoload_register('Autoloader::autoloadTrait');
    spl_autoload_register('Autoloader::autoloadLibrary');
    spl_autoload_register('Autoloader::autoloadLibraryFormsContact');
    spl_autoload_register('Autoloader::autoloadLibraryFormsLogin');
    spl_autoload_register('Autoloader::autoloadLibraryFormsMenu');
    spl_autoload_register('Autoloader::autoloadLibraryFormsPricesSimulation');
    spl_autoload_register('Autoloader::autoloadLibraryFormsRegistration');
    spl_autoload_register('Autoloader::autoloadLibraryFormsSubscription');
    spl_autoload_register('Autoloader::autoloadLibraryFormsUploadFiles');
    spl_autoload_register('Autoloader::autoloadLibraryForms');
    spl_autoload_register('Autoloader::autoloadLibraryControls');

    abstract class Autoloader
    {
// DAO
        static function autoloadDao($class)
        {
            $file = 'models/dao/' . $class . '.php';
            if(is_file($file) && is_readable($file))
            {
                require $file;
            }
        }
        static function autoloadDaoDB($class)
        {
            $file = 'models/dao/db/' . $class . '.php';
            if(is_file($file) && is_readable($file))
            {
                require $file;
            }
        }
// DTO
        static function autoloadDto($class)
        {
            $file = 'models/dto/' . $class . '.php';
            if(is_file($file) && is_readable($file))
            {
                require $file;
            }
        }
// TRAITS
        static function autoloadTrait($class)
        {
            $file = 'models/traits/' . lcfirst($class) . '.php';
            if(is_file($file) && is_readable($file))
            {
                require $file;
            }
        }
// LIBRARY
        static function autoloadLibrary($class)
        {
            $file = 'library/' . lcfirst($class) . '.php';
            if(is_file($file) && is_readable($file))
            {
                require $file;
            }
        }

        static function autoloadLibraryFormsRegistration($class)
        {
            $file = 'library/forms/registration/' . $class . '.php';
            if(is_file($file) && is_readable($file))
            {
                require $file;
            }
        }

        static function autoloadLibraryFormsSubscription($class)
        {
            $file = 'library/forms/subscription/' . $class . '.php';
            if(is_file($file) && is_readable($file))
            {
                require $file;
            }
        }

        static function autoloadLibraryFormsLogin($class)
        {
            $file = 'library/forms/login/' . $class . '.php';
            if(is_file($file) && is_readable($file))
            {
                require $file;
            }
        }

        static function autoloadLibraryFormsUploadFiles($class)
        {
            $file = 'library/forms/uploadFiles/' . $class . '.php';
            if(is_file($file) && is_readable($file))
            {
                require $file;
            }
        }

        static function autoloadLibraryFormsContact($class)
        {
            $file = 'library/forms/contact/' . $class . '.php';
            if(is_file($file) && is_readable($file))
            {
                require $file;
            }
        }

        static function autoloadLibraryFormsMenu($class)
        {
            $file = 'library/forms/menu/' . $class . '.php';
            if(is_file($file) && is_readable($file))
            {
                require $file;
            }
        }

        static function autoloadLibraryFormsPricesSimulation($class)
        {
            $file = 'library/forms/pricesSimulation/' . $class . '.php';
            if(is_file($file) && is_readable($file))
            {
                require $file;
            }
        }

        static function autoloadLibraryForms($class)
        {
            $file = 'library/forms/' . $class . '.php';
            if(is_file($file) && is_readable($file))
            {
                require $file;
            }
        }

        static function autoloadLibraryControls($class)
        {
            $file = 'library/controls/' . $class . '.php';
            if(is_file($file) && is_readable($file))
            {
                require $file;
            }
        }
        
    }