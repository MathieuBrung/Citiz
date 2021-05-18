// ---------- Fonction de contrôle principale ---------- //
    function controlContactForm()
    {
        var errorMessageContact = document.getElementById("errorMessageContact");
        errorMessageContact.style.color = "red";

        var mail = document.getElementById("emailContact");
        var message = document.getElementById("contactMessage");


        if(document.getElementById("emailContact"))
        {
            if(controlEmail(mail.value))
            {
                errorMessageContact.innerHTML = "";
                if(controlLastName(lastName.value))
                {
                    errorMessageContact.innerHTML = "";
                    if(controlFirstName(firstName.value))
                    {
                        errorMessageContact.innerHTML = "";
                        if(controlMessage(message.value))
                        {
                            submitActivated();
                            errorMessageContact.innerHTML = "Le formulaire est valide.";
                            errorMessageContact.style.color = "green";
                        }
                        else
                        {
                            submitDisabled();
                            errorMessageContact.innerHTML = "Votre message doit contenir au moins 100 caractères."
                        }
                    }
                    else
                    {
                        submitDisabled()
                    }
                }
                else
                {
                    submitDisabled()
                }
            }
            else
            {
                submitDisabled();
                errorMessageContact.innerHTML = "Votre adresse mail n'est pas valide.";
            }
        }
        else if(controlMessage(message.value))
        {
            submitActivated();
            errorMessageContact.innerHTML = "Le formulaire est valide.";
            errorMessageContact.style.color = "green";
        }
        else
        {
            submitDisabled();
            errorMessageContact.innerHTML = "Votre message doit contenir au moins 100 caractères."
        }
    }

// ---------- Contrôle de l'adresse mail ---------- //
    function controlEmail(mail)
    {
        const regex = /^[a-z0-9]+([\._-][a-z0-9]+){0,5}@[a-z0-9]+([\._-][a-z0-9]+){0,3}\.[a-z]{2,4}$/g;

        if(mail.match(regex))
        {
            document.getElementById("emailContact").style.borderColor = "green";
            document.getElementById("labelEmail").style.color = "green";
            return true;
        }
        else
        {
            document.getElementById("emailContact").style.borderColor = "red";
            document.getElementById("labelEmail").style.color = "red";
            return false;
        }
    }

// ---------- Contrôle de la longueur du message ---------- //
    function controlMessage(message)
    {
        const minLength = 100;
        
        var span = document.getElementById("messageLength");
        var messageLength = minLength - message.length;

        if(messageLength > 0)
        {
            span.innerHTML = messageLength;
            document.getElementById("contactMessage").style.borderColor = "red";
            document.getElementById("labelMessage").style.color = "red";
            return false;
        }
        else
        {
            span.innerHTML = 0;
            document.getElementById("contactMessage").style.borderColor = "green";
            document.getElementById("labelMessage").style.color = "green";
            return true;
        }
    }

// ---------- Contrôle des noms ---------- //
    function controlLastName(lastName)
    {
        const regex = /^[A-Z][a-zâêîôûàèìòùáéíóúäëïöüãõñç]+(([-]{1,2}[A-Z][a-zâêîôûàèìòùáéíóúäëïöüãõñç]+)?|([ ][A-Z]?[a-zâêîôûàèìòùáéíóúäëïöüãõñç]+){1,2})$/gm;
        
        if(lastName.match(regex))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    function controlFirstName(firstName)
    {
        const regex = /^[A-Z][a-zâêîôûàèìòùáéíóúäëïöüãõñç]+([-][A-Z][a-zâêîôûàèìòùáéíóúäëïöüãõñç]+)?$/gm

        if(firstName.match(regex))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

// ---------- Fonctions d'activation et désactivation du boutton d'envoi ---------- //
    function submitDisabled()
    {
        document.getElementById('submitContact').disabled = true;
        document.getElementById('submitContact').style.borderColor = "";
    }
    function submitActivated()
    {
        document.getElementById('submitContact').disabled = false;
        document.getElementById('submitContact').style.borderColor = "green";
    }