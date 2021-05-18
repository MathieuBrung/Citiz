// ---------- Fonction de contrôle principale ---------- //
function controlLoginForm()
{
    var errorMessageLogin = document.getElementById("errorMessageLogin");
    errorMessageLogin.style.color = "red";
    
    var mail = document.getElementById("emailLogin");
    var password = document.getElementById("password");


    if(controlEmail(mail.value))
    {
        errorMessageLogin.innerHTML = "";
        if(controlPassword(password.value))
        {
            submitActivated()
            errorMessageLogin.innerHTML = "Le formulaire est valide.";
            errorMessageLogin.style.color = "green";
        }
        else
        {
            submitDisabled()
            errorMessageLogin.innerHTML = "Votre mot de passe, de 8 caractères minimum et 20 maximum, doit contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial.";
        }

    }
    else
    {
        submitDisabled()
        errorMessageLogin.innerHTML = "Votre adresse mail n'est pas valide.";
    }
}

// ---------- Contrôle de l'adresse mail ---------- //
function controlEmail(mail)
{
    const regex = /^[a-z0-9]+([\._-][a-z0-9]+){0,5}@[a-z0-9]+([\._-][a-z0-9]+){0,3}\.[a-z]{2,4}$/g;

    if(mail.match(regex))
    {
        document.getElementById("emailLogin").style.borderColor = "green";
        document.getElementById("labelEmail").style.color = "green";
        return true;
    }
    else
    {
        document.getElementById("emailLogin").style.borderColor = "red";
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

// ---------- Activation et désactivation du bouton d'envoi ---------- //
function submitDisabled()
{
    document.getElementById('submitLogin').disabled = true;
    document.getElementById('submitLogin').style.borderColor = "";
}

function submitActivated()
{
    document.getElementById('submitLogin').disabled = false;
    document.getElementById('submitLogin').style.borderColor = "green";
}