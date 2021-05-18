<?php
    ob_start();
?>

<!-- <form action="index.php" method="post">
    <fieldset>
        <legend>Type d'inscription</legend>
        <input type="radio" name="registrationType" id="" value="Coopérative">
        <label for="registrationType">Coopérative</label><br>
        <input type="radio" name="registrationType" id="" value="Standard">
        <label for="registrationType">Standard</label>
    </fieldset><br>

    <fieldset>
        <legend>Choix de la formule</legend>
        <input type="radio" name="formula" id="" value="Fréquence">
        <label for="formula">Fréquence</label><br>
        <input type="radio" name="formula" id="" value="Classique">
        <label for="formula">Classique</label><br>
        <input type="radio" name="formula" id="" value="Mini">
        <label for="formula">Mini</label>
    </fieldset><br>

    <fieldset>
        <legend>Informations personnelles</legend>
        <label for="subscriberDateOfBirth">Date de naissance</label><br>
        <input type="date" name="subscriberDateOfBirth" id=""><br>

    Longueur max à 100
        <label for="subrscriberStreet">Rue</label><br>
        <input type="text" name="subrscriberStreet" id=""><br>

    Longueur max à 255
        <label for="subscriberAdressDetails">Compléments</label><br>
        <input type="text" name="subscriberAdressDetails" id=""><br>

    Longueur maximale à 5
        <label for="subscriberPostalCode">Code postal</label><br>
        <input type="text" name="subscriberPostalCode" id=""><br>

    Longueur max à 100
        <label for="subscriberCity">Ville</label><br>
        <input type="text" name="subscriberCity" id=""><br>

    regex pour tel mobile
        <label for="userPhoneNumber">Téléphone mobile</label><br>
        <input type="text" name="userPhoneNumber" id="">
    </fieldset><br>

Mettre une liste déroulante sur le choix du type de paiement 
        et apparition du formulaire en fonction ?
    <fieldset>
        <legend>Mandat de prélèvement</legend>
    Longueur maximale à 255
        <label for="PIBankName">Nom de la banque</label><br>
        <input type="text" name="PIBankName" id=""><br>

    Longueur maximale à 50
        <label for="PIHolderLastName">Nom</label><br>
        <input type="text" name="PIHolderLastName" id=""><br>

    Longueur maximale à 50
        <label for="PIHolderFirstName">Prénom</label><br>
        <input type="text" name="PIHolderFirstName" id=""><br>

    Longueur maximale à 27
    Regex IBAN
        <label for="PIIBAN">IBAN</label><br>
        <input type="text" name="PIIBAN" id=""><br>

    Longueur maximale à 11
    Regex BIC ?
        <label for="PIBIC">BIC</label><br>
        <input type="text" name="PIBIC" id="">
    </fieldset><br>

    <input type="checkbox" name="checkConditions" id="">
    <label for="checkConditions">Acceptation des conditions + déclaration d'avoir pris connaissance</label><br>

    <input type='hidden' name='formName' value='subscription'>
    <span class='' id='errorMessageSubscription'></span><br>
    <input type='submit' value='Abonnement' class='' id='submitSubscription' onsubmit='controlSubscriptionForm()'>
</form> -->

<?php
    // echo FormSubscription::formCreation();

    $content = ob_get_clean();
    require('views/template.php');
?>