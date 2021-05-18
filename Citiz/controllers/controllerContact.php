<?php

if(isset($_SESSION['connect']) && $_SESSION['connect'] == false)
{
    extract($_POST);
    if(FormContact::formController($emailContact, $contactMessage, $lastName, $firstName) === true)
    {
        // Appel de la fonction d'envoie de mail
        if(FormContact::sendEmail($emailContact, $listOptionscontact, $contactMessage, $lastName, $firstName))
        {
            unset($_POST);
            header('Location: index.php');
        }
        else
        {
            throw new Exception('Erreur : Échec de l\'envoie du mail.');
        }
    }
    else
    {
        throw new Exception(FormContact::formController($emailContact, $contactMessage, $lastName, $firstName));
    }
}
else if(isset($_SESSION['connect']) && $_SESSION['connect'] == true)
{
    extract($_POST);
    $emailContact = $_SESSION['email'];
    $lastName = $_SESSION['lastName'];
    $firstName = $_SESSION['firstName'];

    if(FormContact::formController($emailContact, $contactMessage, $lastName, $firstName) === true)
    {
        // Appel de la fonction d'envoie de mail
        if(FormContact::sendEmail($emailContact, $listOptionscontact, $contactMessage, $lastName, $firstName))
        {
            unset($_POST);
            header('Location: index.php');
        }
        else
        {
            throw new Exception('Erreur : Échec de l\'envoie du mail.');
        }
    }
    else
    {
        throw new Exception(FormContact::formController($emailContact, $contactMessage, $lastName, $firstName));
    }

}
else
{
    throw new Exception('Erreur : Échec de la vérification du formulaire de contact.');
}