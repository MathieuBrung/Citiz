// ---------- Liste d'options pour l'upload de fichiers ---------- //
    function listOptionsUploadedFiles()
    {
    // Array à changer en fonction des besoins
        var optionsTab = new Array('Permis de conduire', 'Justificatif de domicile', 'Relevé d\'assurance');
        var list = document.getElementById("listOptionsUploadedFiles");

        for(var i = 0; i < optionsTab.length; i++)
        {
            var option = new Option(optionsTab[i], optionsTab[i]);
            list.add(option, undefined);
        }
    }

// ---------- Liste d'option pour le formulaire de contact ---------- //
    function listOptionsContact()
    {
    // Array à changer en fonction des besoins
        var optionsTab = new Array('...', 'Option 1', 'Option 2', 'Option n');
        var list = document.getElementById("listOptionscontact");

        for(var i = 0; i < optionsTab.length; i++)
        {
            var option = new Option(optionsTab[i], optionsTab[i]);
            list.add(option, undefined);
        }
    }

// ---------- Liste d'option pour le formulaire d'abonnement ---------- //
function listOptionsPaymentMode()
{
// Array à changer en fonction des besoins
    var optionsTab = new Array('...', 'Carte de crédit', 'PayPal', 'Virement');
    var list = document.getElementById("listOptionPM");

    for(var i = 0; i < optionsTab.length; i++)
    {
        var option = new Option(optionsTab[i], optionsTab[i]);
        list.add(option, undefined);
    }
}