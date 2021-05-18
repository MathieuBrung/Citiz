<?php

    abstract class ControlUploadFiles
    {
    // Contrôle sur les erreurs lors du téléchargement => message ou bool
        // Pour les erreurs de taille, elles sont dans la méthode controlSize()
        static function controlError($file)
        {
            if (isset($file['error']))
            {
                switch ($file['error'])
                {
                    case 0:
                        return true;
                    break;
    
                    // case 1:
                    //     $message = "La taille du fichier téléchargé excède la valeur de upload_max_filesize, configurée dans le php.ini.";
                    // break;
                    
                    // case 2:
                    //     $message = "La taille du fichier téléchargée excède la valeur de MAX_FILE_SIZE, qui a été spécifiée dans le formulaire HTML.";
                    // break;
    
                    case 3:
                        $message = "Le fichier n'a été que partiellement téléchargée.";
                    break;
    
                    case 4:
                        $message = "Aucun fichier n'a été téléchargé.";
                    break;
    
                    // case 5:
                    //     $message = "";
                    // break;
    
                    case 6:
                        $message = "Un dossier temporaire est manquant.";
                    break;
    
                    case 7:
                        $message = "Échec de l'écriture du fichier sur le disque.";
                    break;
    
                    case 8:
                        $message = "Une extension PHP a arrêté l'envoi de fichier.";
                    break;
                }
            }
            else
            {
                $message = "Aucun fichier n'a été transmis à la fonction de recherche d'erreur.";
            }

            return $message;
        }

    // Contrôle du type de fichier - extension => bool
        static function controlExtension($file, array $_allowedExtensions)
        {
            $fileExtension = substr(strrchr($file['name'], "."), 1);

            foreach ($_allowedExtensions as $extension)
            {
                if ($fileExtension == $extension)
                {
                    return true;
                }
            }
            return false;
        }

    // Contrôle de la taille du fichier (octets) => bool - false = fichier trop grand
        static function controlSize($file, $fileSizeMax)
        {
            if (isset($file['error']))
            {
                switch ($file['error'])
                {    
                    case 1:
                        // La taille du fichier téléchargé excède la valeur de upload_max_filesize, configurée dans le php.ini.
                        return false;
                    break;
                    
                    case 2:
                        // La taille du fichier téléchargée excède la valeur de MAX_FILE_SIZE, qui a été spécifiée dans le formulaire HTML.
                        return false;
                    break;
                }
            }

            if($file['size'] > $fileSizeMax)
            {
                return false;
            }
            
            return true;
        }
        
    // Contrôle sur l'existence du dossier de destination, sinon création => retourne le chemin de destination
        static function controlDestination($directory, $userId, $userName)
        {
            $path = "$directory/$userId - $userName";

            if(!file_exists($path))
            {
                mkdir($path, 0777, true);
            }
            $path .= '/';
            return $path;
        }

    // Fonctions de modification du nom de fichier
        // Nettoyage du nom => retourne le nom nettoyé
        // À utiliser si on veut garder le nom de fichier qui a été envoyé
        static function fileNameByCleaning($file)
        {
            $extension = self::getExtension($file);
            // On enlève l'extension
            $nameBeforeCleaning = preg_replace('#.' . $extension . '#', '', $file['name']);

            // On enlève les caractères interdits
            $nameWhileCleaning = preg_replace('~[^\\pL\d]+~u', '-', $nameBeforeCleaning);
            // On enlève les - en début et fin de chaîne de caractères
            $nameWhileCleaning = trim($nameWhileCleaning, '-');
            // On met la chaîne en minuscule
            $nameWhileCleaning = strtolower($nameWhileCleaning);

            // On refait le ménage une dernière fois
            $nameAfterCleaning = preg_replace('~[^-\w]+~', '', $nameWhileCleaning);

            return $nameAfterCleaning;
        }

        // Retourne le nom de la catégorie choisi dans la liste d'option
        static function fileNameByOptions($option)
        {
            $newName = $option;
            return $newName;
        }

        // Retourne l'extension du fichier
        static function getExtension($file)
        {
            $extension = substr(strrchr($file['name'], "."), 1);
            return $extension;
        }

    // Fonction pour déplacer le fichier de son dossier temporaire
        // Paramètre newNameType qui sert à déterminer si on veut un nom nettoyé -> 1
        // ou un nom basé sur l'option sélectionnée -> 2
        static function fileMoveTo($file, $path, $newNameType)
        {
            $extension = self::getExtension($file);

            if($newNameType == 1) // Méthode de nettoyage
            {
                $newFileName = self::fileNameByCleaning($file);
                $newFileName .= '.' . $extension;
                $moveTo = $path . $newFileName;
                return (move_uploaded_file($file['tmp_name'], $moveTo));
            }
            elseif ($newNameType == 2) // Récupération du nom de l'option
            {
                if(isset($_POST['listOptionsUploadedFiles']))
                {
                    $newFileName = self::fileNameByOptions($_POST['listOptionsUploadedFiles']);
                    $newFileName .= '.' . $extension;
                    $moveTo = $path . $newFileName;
                    return (move_uploaded_file($file['tmp_name'], $moveTo));
                }
                return false;
            }

            return false;
        }
    }