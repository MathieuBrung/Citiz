// ---------- Fonction de contrôle principale ---------- //
    function controlUploadFilesForm()
    {
    // À mettre en commun avec le tableau des extensions autorisées dans controllerUploadFiles.php
        const extensions = new Array('png', 'jpg', 'pdf');

        var errorMessageUploadFiles = document.getElementById("errorMessageUploadFiles");
        errorMessageUploadFiles.style.color = "red";

        if(controlExtension(extensions))
        {
            submitActivated()
            errorMessageUploadFiles.innerHTML = "Type de fichier valide.";
            errorMessageUploadFiles.style.color = "green";
        }
        else
        {
            submitDisabled()

            var message = "Le fichier envoyé doit être de type ";
            for (var i = 0; i < extensions.length; i++)
            {
                if(i <= extensions.length - 3)
                {
                    message += extensions[i] + ', ';
                }
                else if(i == extensions.length - 2)
                {
                    message += extensions[i] + ' ou ';
                }
                else if(i == extensions.length - 1)
                {
                    message += extensions[i] + '.';
                }
            }
            errorMessageUploadFiles.innerHTML = message;
        }
    }

// ---------- Contrôle de l'extension du fichier ---------- //
    function controlExtension(extensions)
    {
        var file = document.getElementById("file").value;
        var extension = file.substring(file.lastIndexOf('.') + 1);

        if(extensions.includes(extension))
        {
            return true;
        }
    }

// ---------- Fonctions d'activation et désactivation du boutton d'envoie ---------- //
    function submitActivated()
    {
        document.getElementById('submitUploadFiles').disabled = false;
        document.getElementById('submitUploadFiles').style.borderColor = "green";
    }
    function submitDisabled()
    {
        document.getElementById('submitUploadFiles').disabled = true;
        document.getElementById('submitUploadFiles').style.borderColor = "";
    }
