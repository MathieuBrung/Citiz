<?php

if(isset($_POST['emailLogin']) && isset($_POST['password']))
{
    extract($_POST);

    if(FormLogin::formController($emailLogin, $password) === true)
    {
        if(UserDAO::userExist($emailLogin, $password))
        {
            $user = UserDAO::getUserByEmail($emailLogin);
            $_SESSION['email'] = $emailLogin;
            $_SESSION['lastName'] = $user->getUserLastName();
            $_SESSION['firstName'] = $user->getUserFirstName();
            $_SESSION['userType'] = $user->getUTName();
            $_SESSION['subscriberId'] = SubscriberDAO::getSubscriberIdByEmail($emailLogin);

            $_SESSION['connect'] = true;

            unset($_POST);
            header('Location: index.php');
        }
        else
        {
            throw new Exception('Erreur : Échec de la connexion. Mauvais identifiant ou mot de passe.');
        }
    }
    else
    {
        throw new Exception(FormLogin::formController($emailLogin, $password));
    }
}
else
{
    throw new Exception('Erreur : Échec de la connexion. Aucun identifiant ou mot de passe envoyé.');
}
