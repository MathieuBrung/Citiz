// ---------- Fonction de contrôle principale ---------- //
    function controlRegistrationForm()
    {
        var errorMessageRegistration = document.getElementById("errorMessageRegistration");
        errorMessageRegistration.style.color = "red";
        
        var mail = document.getElementById("emailRegistration");
        var lastName = document.getElementById("lastName");
        var firstName = document.getElementById("firstName");
        var password = document.getElementById("password");


        if(controlEmail(mail.value))
        {
            errorMessageRegistration.innerHTML = "";
            if(controlLastName(lastName.value))
            {
                errorMessageRegistration.innerHTML = "";
                if(controlFirstName(firstName.value))
                {
                    errorMessageRegistration.innerHTML = "";
                    if(controlPassword(password.value))
                    {
                        submitActivated()
                        errorMessageRegistration.innerHTML = "Le formulaire est valide.";
                        errorMessageRegistration.style.color = "green";
                    }
                    else
                    {
                        submitDisabled()
                        errorMessageRegistration.innerHTML = "Votre mot de passe, de 8 caractères minimum et 20 maximum, doit contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial.";
                    }
                }
                else
                {
                    submitDisabled()
                    errorMessageRegistration.innerHTML = "Veillez à bien mettre les majuscules en début de nom et prénom.";
                }
            }
            else
            {
                submitDisabled()
                errorMessageRegistration.innerHTML = "Veillez à bien mettre les majuscules en début de nom et prénom.";
            }
        }
        else
        {
            submitDisabled()
            errorMessageRegistration.innerHTML = "Votre adresse mail n'est pas valide.";
        }
    }

// ---------- Contrôle de l'adresse mail ---------- //
    function controlEmail(mail)
    {
        const regex = /^[a-z0-9]+([\._-][a-z0-9]+){0,5}@[a-z0-9]+([\._-][a-z0-9]+){0,3}\.[a-z]{2,4}$/g;

        if(mail.match(regex))
        {
            document.getElementById("emailRegistration").style.borderColor = "green";
            document.getElementById("labelEmail").style.color = "green";
            return true;
        }
        else
        {
            document.getElementById("emailRegistration").style.borderColor = "red";
            document.getElementById("labelEmail").style.color = "red";
            return false;
        }
    }

// ---------- Contrôle du mot de passe ---------- //
    function controlPassword(password)
    {
        const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,20}$/gm;

        if(password.match(regex))
        {
            document.getElementById("password").style.borderColor = "green";
            document.getElementById("labelPassword").style.color = "green";
            return true;
        }
        else
        {
            document.getElementById("password").style.borderColor = "red";
            document.getElementById("labelPassword").style.color = "red";
            return false;
        }
    }

// ---------- Contrôle des noms ---------- //
    function controlLastName(lastName)
    {
        // Il faudra surement autorisé les minuscules en début de nom
        // et les ajouter au moment de l'enregistrement en bdd
        const regex = /^[A-Z][a-zâêîôûàèìòùáéíóúäëïöüãõñç]+(([-]{1,2}[A-Z][a-zâêîôûàèìòùáéíóúäëïöüãõñç]+)?|([ ][A-Z]?[a-zâêîôûàèìòùáéíóúäëïöüãõñç]+){1,2})$/gm; 
        
        if(lastName.match(regex))
        {
            document.getElementById("lastName").style.borderColor = "green";
            document.getElementById("labelLastName").style.color = "green";
            return true;
        }
        else
        {
            document.getElementById("lastName").style.borderColor = "red";
            document.getElementById("labelLastName").style.color = "red";
            return false;
        }
    }
    function controlFirstName(firstName)
    {
        // Il faudra surement autorisé les minuscules en début de prénom
        // et les ajouter au moment de l'enregistrement en bdd
        const regex = /^[A-Z][a-zâêîôûàèìòùáéíóúäëïöüãõñç]+([-][A-Z][a-zâêîôûàèìòùáéíóúäëïöüãõñç]+)?$/gm

        if(firstName.match(regex))
        {
            document.getElementById("firstName").style.borderColor = "green";
            document.getElementById("labelFirstName").style.color = "green";
            return true;
        }
        else
        {
            document.getElementById("firstName").style.borderColor = "red";
            document.getElementById("labelFirstName").style.color = "red";
            return false;
        }
    }

// ---------- Activation et désactivation du bouton d'envoi ---------- //
    function submitDisabled()
    {
        document.getElementById('submitRegistration').disabled = true;
        document.getElementById('submitRegistration').style.borderColor = "";
    }

    function submitActivated()
    {
        document.getElementById('submitRegistration').disabled = false;
        document.getElementById('submitRegistration').style.borderColor = "green";
    }