<?php
   
// Récupère le fichier envoyé
    $file = $_FILES['file'];

// Récupérer les varaibles de session d'utilisateur ou la valeur des attributs de l'objet User
    $userId = 1;
    $userName = "UserName";

// Variables à changer en fonction des besoins
    $allowedExtensions = array('pdf', 'jpg', 'png');
    $fileSizeMax = 8000000;
    $directory = "UsersDirectory";
    $newNameType = 2; // 1 = Nettoyage, 2 = Nom récupéré dans l'option

// Appel de la fonction
    // echo FormUploadFiles::formController($file, $allowedExtensions, $fileSizeMax, $directory, $userId, $userName, $newNameType);

    if(FormUploadFiles::formController($file, $allowedExtensions, $fileSizeMax, $directory, $userId, $userName, $newNameType) === true)
    {
        // Reste à faire la requête pour ajouter le chemin du dossier dans la bdd
        // fonction du genre userDAO::addDirectory($path)
        $path = ControlUploadFiles::controlDestination($directory, $userId, $userName);
        if(UserDAO::addDirectory($path))
        {
            unset($_FILES);
            unset($_POST);
            header('Location: index.php');
        }
        else
        {
            throw new Exception('Erreur : Échec de l\'ajout du dossier de destination de l\'utilisateur.');
        }
    }
    else
    {
        throw new Exception(FormUploadFiles::formController($file, $allowedExtensions, $fileSizeMax, $directory, $userId, $userName, $newNameType));
    }

