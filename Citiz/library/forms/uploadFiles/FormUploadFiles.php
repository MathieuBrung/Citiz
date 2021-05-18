<?php
// Le formulaire est prêt pour les contrôles de saisie mais pas pour le style
// Des éventuelles classes et div sont à rajoutées

    abstract class FormUploadFiles
    {
    // Fonction de création du formulaire
        // FormUploadFiles::formCreation(1) pour l'instancier avec la liste
        static function formCreation($options)
        {
            $form ="<form class='' method='post' action='index.php' enctype='multipart/form-data'>";
            if($options == 1)
            {
                // La liste est instanciée dans le fichier lists.js à la fonction listOptionsUploadedFiles()
                $form .= "<select class='' id='listOptionsUploadedFiles' name='listOptionsUploadedFiles' required>
                                    <option selected>-- Choix du type du document --</option>
                                </select><br><br>";
            }
            $form .=" <input type='file' name='file' class='' id='file' onchange='controlUploadFilesForm()'><br><br>

                            <input type='hidden' name='formName' value='uploadFiles'>
                            <span class='' id='errorMessageUploadFiles'></span><br><br>
                            <input type='submit' value='Envoyer' class='' id='submitUploadFiles' disabled='true' onsubmit='controlUploadFilesForm()'>
                        </form>";

            return $form;
        }

    // Fonction de controle du fichier envoyé
        static function formController($file, $allowedExtensions, $fileSizeMax, $directory, $userId, $userName, $newNameType)
        {
            if(ControlUploadFiles::controlError($file))
            {
                if(ControlUploadFiles::controlExtension($file, $allowedExtensions))
                {
                    if(ControlUploadFiles::controlSize($file, $fileSizeMax))
                    {
                        $path = ControlUploadFiles::controlDestination($directory, $userId, $userName);
                        if(ControlUploadFiles::fileMoveTo($file, $path, $newNameType))
                        {
                            return true;
                        }
                        else
                        {
                            $error = 'Erreur : Le fichier n\'a pas pu être déplacé.';
                        }
                    }
                    else
                    {
                        $error = 'Erreur : La taille du fichier est trop grande.';
                    }
                }
                else
                {
                    $error = 'Erreur : L\'extension du fichier ne fait pas partie de celles autorisées.';
                }
            }
            else
            {
                $error = ControlUploadFiles::controlError($file);
            }

            return $error;
        }

    }