<?php

    abstract class FormContact
    {
        // Ajouter une condition qui regarde si la personne qui envoie le mail est connectée
        // si oui alors on récupère son mail dans la variable de session pour l'utiliser comme adresse d'expéditeur
        // si non alors on affiche le champ qui demande de saisir l'adresse mail
        // Pareil pour nom et prénom
        static function formCreation()
        {
            $form = "<form class='' action='index.php' method='post'>";

            // Condition sur si la varaible de session email est rempli ?
            // Variable 'connect' ?
            if(isset($_SESSION['connect']) && $_SESSION['connect'] == false)
            {
                $form .= "<label for='emailContact' class='' id='labelEmail'>Mail :</label><br>
                                <input type='email' name='emailContact' class='' id='emailContact' pattern='^[a-z0-9]+([\._-][a-z0-9]+){0,5}@[a-z0-9]+([\._-][a-z0-9]+){0,3}\.[a-z]{2,4}$' required onkeyup='controlContactForm()'><br><br>
                    
                                <label for='lastName' class='' id='labelLastName'>Nom :</label><br>
                                <input type='text' name='lastName' class='' id='lastName' required onkeyup='controlContactForm()'><br><br>
                    
                                <label for='firstName' class='' id='labelFirstName'>Prénom :</label><br>
                                <input type='text' name='firstName' class='' id='firstName' required onkeyup='controlContactForm()'><br><br>";
            }

            $form .= "<label for='listOptionscontact' class=''>Sujet :</label><br>
                        <select name='listOptionscontact' class='' id='listOptionscontact' required onchange='controlContactForm()'></select><br><br>
                
                        <label for='contactMessage' class='' id='labelMessage'>Message :</label><br>
                        <textarea name='contactMessage' class='' id='contactMessage' cols='30' rows='10' onkeyup='controlContactForm()'></textarea><br>
                        <span class=''>Caractères restants obligatoires : </span><span class='' id='messageLength'>100</span><br><br>
                
                        <input type='hidden' name='formName' value='contact'>
                        <span class='' id='errorMessageContact'></span><br><br>
                        <input type='submit' value='Envoyer' class='' id='submitContact' disabled onsubmit='controlContactForm()'>
                    </form>";

            return $form;
        }

        static function formController($email, $message, $lastName, $firstName)
        {
            if(ControlEmail::control($email))
            {
                if(ControlContact::controlMessage($message))
                {
                    if(ControlLastName::control($lastName))
                    {
                        if(ControlFirstName::control($firstName))
                        {
                            return true;
                        }
                        else
                        {
                            $error = 'Erreur : Une erreur est survenue sur votre prénom.';
                        }
                    }
                    else
                    {
                        $error = 'Erreur : Une erreur est survenur sur votre nom.';
                    }
                }
                else
                {
                    $error = 'Erreur : Votre message doit faire au moins 100 caractères.';
                }
            }
            else
            {
                $error = 'Erreur : Votre adresse email ne respecte pas nos conditions de sécurité.';
            }
            return $error;
        }

        static function sendEmail($email, $listOptionscontact, $message, $lastName, $firstName)
        {
            // Penser au headers avec le from, reply-to etc

            // Changer la valeur en fonction de l'option de liste choisie
            $to = 'brung.mathieu@gmail.com';

            // Destinataire copie du mail
            $copy = '';

            // Nom + prénom + option de liste choisie
            $subject = $lastName . ' ' . $firstName . ' - ' . $listOptionscontact;

            // From le contact du site, répondre à l'expéditeur
            $headers = array(
                'From' => 'contact@mbr.fr',
                'Reply-To' => $email,
                'Cc' => $copy
            );

            if(mail($to, $subject, $message, $headers))
            {
                return true;
            }
            return false;
        }
    }