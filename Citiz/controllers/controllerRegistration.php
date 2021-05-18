<?php

if(isset($_POST['emailRegistration']) && isset($_POST['password']) && isset($_POST['lastName']) && isset($_POST['firstName']))
{
    extract($_POST);
    
    if(FormRegistration::formController($emailRegistration, $password, $lastName, $firstName) === true)
    {
        $user = new User([
            'UserEmail' => $emailRegistration,
            'UserLastName' => $lastName,
            'UserFirstName' => $firstName,
            'UserPassword' => $password,
            'UserPhoneNumber' => "",
            'UTCode' => 4 // 4 = Utilisateur, par défaut car le changement de type se fait dans un deuxième temps
        ]);
        if(UserDAO::addUser($user))
        {
            unset($_POST);
            header('Location: index.php');
        }
        else
        {
            throw new Exception('Erreur : Échec de l\'ajout de l\'utilisateur.');
        }
    }
    else
    {
        throw new Exception(FormRegistration::formController($emailRegistration, $password, $lastName, $firstName));
    }
}
else
{
    throw new Exception('Erreur : Échec de l\'inscription. Aucun email, mot de passe, nom ou prénom envoyé.');
}
