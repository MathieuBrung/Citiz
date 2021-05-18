function switchPM()
{
    option = document.getElementById("listOptionPM").value;

    switch (option) {
        case "Virement":
            PMTransfer();
            break;
    
        default:
            PMDefault();
            break;
    }
}

function PMDefault()
{
    let parent = document.getElementById("PMForm");
    parent.innerHTML = "";
}

function PMTransfer()
{
    let parent = document.getElementById("PMForm");
    parent.innerHTML = "";
    let paragraph = document.createElement('p');
    let text = textTransfer();
    let fieldset = document.createElement('fieldset');
    let legend = document.createElement('legend');

    paragraph.innerHTML = text;

    parent.appendChild(createBR());
    
    legend.innerHTML = "Mandat de prélèvement";
    fieldset.appendChild(legend);
    parent.appendChild(fieldset);
    
    fieldset.appendChild(paragraph);

    fieldset.appendChild(createLabel("id", "Nom de la banque", "class"));
    fieldset.appendChild(createBR());
    fieldset.appendChild(createInputText("id", "PIBankName", "class"));
    fieldset.appendChild(createBR());
    
    fieldset.appendChild(createLabel("id", "Nom", "class"));
    fieldset.appendChild(createBR());
    fieldset.appendChild(createInputText("id", "PIHolderLastName", "class"));
    fieldset.appendChild(createBR());
    
    fieldset.appendChild(createLabel("id", "Prénom", "class"));
    fieldset.appendChild(createBR());
    fieldset.appendChild(createInputText("id", "PIHolderFirstName", "class"));
    fieldset.appendChild(createBR());
    
    fieldset.appendChild(createLabel("id", "IBAN", "class"));
    fieldset.appendChild(createBR());
    fieldset.appendChild(createInputText("id", "PIIBAN", "class"));
    fieldset.appendChild(createBR());
    
    fieldset.appendChild(createLabel("id", "BIC", "class"));
    fieldset.appendChild(createBR());
    fieldset.appendChild(createInputText("id", "PIBIC", "class"));
    fieldset.appendChild(createBR());
};

function textTransfer()
{
    let text = "En remplissant ce formulaire de mandat, vous autorisez SCIC AUTOCOOL à envoyer des instructions à votre banque pour débiter votre compte, et votre banque à débiter votre compte conformément aux instructions de SCIC AUTOCOOL. ";
        text += "Vous bénéficiez du droit d’être remboursé par votre banque selon les conditions décrites dans la convention que vous avez passée avec elle. ";  
        text += "Une demande de remboursement doit être présentée dans les 8 semaines suivant la date de débit de votre compte pour un prélèvement autorisé. ";
        text += "Vos droits concernant le présent mandat sont expliqués dans un document que vous pouvez obtenir auprès de votre banque. ";
        text += "Les informations contenues dans le présent mandat, sont destinées à n\'être utilisées par le créancier que pour la gestion de sa relation avec son client. ";
        text += "Elles pourront donner lieu à l\'exercice, par ce dernier, de ses droits d\'oppositions, d\'accès et de rectification tels que prévus par la RGPD.";
    return text;
}

// Contrôle de l'IBAN en fonction des pays
function isValidIBANNumber(input) {
    var CODE_LENGTHS = {
        AD: 24, AE: 23, AT: 20, AZ: 28, BA: 20, BE: 16, BG: 22, BH: 22, BR: 29,
        CH: 21, CR: 21, CY: 28, CZ: 24, DE: 22, DK: 18, DO: 28, EE: 20, ES: 24,
        FI: 18, FO: 18, FR: 27, GB: 22, GI: 23, GL: 18, GR: 27, GT: 28, HR: 21,
        HU: 28, IE: 22, IL: 23, IS: 26, IT: 27, JO: 30, KW: 30, KZ: 20, LB: 28,
        LI: 21, LT: 20, LU: 20, LV: 21, MC: 27, MD: 24, ME: 22, MK: 19, MR: 27,
        MT: 31, MU: 30, NL: 18, NO: 15, PK: 24, PL: 28, PS: 29, PT: 25, QA: 29,
        RO: 24, RS: 22, SA: 24, SE: 24, SI: 19, SK: 24, SM: 27, TN: 24, TR: 26,   
        AL: 28, BY: 28, CR: 22, EG: 29, GE: 22, IQ: 23, LC: 32, SC: 31, ST: 25,
        SV: 28, TL: 23, UA: 29, VA: 22, VG: 24, XK: 20
    };
    var iban = String(input).toUpperCase().replace(/[^A-Z0-9]/g, ''); // keep only alphanumeric characters
    var code = iban.match(/^([A-Z]{2})(\d{2})([A-Z\d]+)$/); // match and capture (1) the country code, (2) the check digits, and (3) the rest
    // check syntax and length
    if (!code || iban.length !== CODE_LENGTHS[code[1]]) {
        return false;
    }
    // rearrange country code and check digits, and convert chars to ints
    digits = (code[3] + code[1] + code[2]).replace(/[A-Z]/g, function (letter) {
        return letter.charCodeAt(0) - 55;
    });
    // final check
    return mod97(digits);
}

function mod97(string) {
    var checksum = string.slice(0, 2), fragment;
    for (var offset = 2; offset < string.length; offset += 7) {
        fragment = String(checksum) + string.substring(offset, offset + 7);
        checksum = parseInt(fragment, 10) % 97;
    }
    return checksum;
}