<?php
if(isset($_POST['checkConditions']) && isset($_POST['inscriptionName']) && isset($_POST['formulaName']))
{
    extract($_POST);
    print_r($_POST);

    if($listOptionPM != "Virement")
    {
        $PIBankName = null;
        $PIHolderLastName = null;
        $PIHolderFirstName = null;
        $PIIBAN = null;
        $PIBIC = null;
    }

    if(FormSubscription::formController($inscriptionName, $formulaName, $subscriberGender, $subscriberDateOfBirth, $subscriberStreet, $subscriberAdressDetails, $subscriberPostalCode, $subscriberCity, $userPhoneNumber, $DLINumber, $DLIObtainingPlace, $DLIObtainingDate, $listOptionPM, $PIBankName, $PIHolderLastName, $PIHolderFirstName, $PIIBAN, $PIBIC, $checkConditions) === true)
    {        
        $pm['PMName'] = $listOptionPM; //transformation en array pour pouvoir l'instancier avec hydrate
        $paymentMode = new PaymentMode($pm);
        $inscription = new Inscription($_POST);
        $formula = new Formula($_POST);
        
        $sub = new Subscriber($_POST);
        $sub->setPaymentMode($paymentMode);
        $sub->setInscription($inscription);
        $sub->setFormula($formula);
        $sub->setUserEmail($_SESSION['email']);
        
        // Ajout de l'abonné
        // $subId = SubscriberDAO::addSub($sub);
        $sub->setSubscriberId(50);       
        
        // Ajout des informations du permis de conduire
        $dli = new DriverLicenseInformation($_POST);
        $dli->setSubscriber($sub);
        // DriverLicenseInformationDAO::addDLIBySubId($dli);
        
        // Ajout des informations sur le paiement
        // Conditions sur si le mode de paiement est "Virement"
        if($listOptionPM == "Virement")
        {
            $pi = new PaymentInformation($_POST);
            $pi->setSubscriber($sub);
            // PaymentInformationDAO::addPIBySubId($pi);    
        }

        var_dump($sub);
        var_dump($dli);
        var_dump($pi);
        // unset($_POST);
        // header('Location: index.php');
    }
    else
    {
        throw new Exception(FormSubscription::formController($inscriptionName, $formulaName, $subscriberGender, $subscriberDateOfBirth, $subscriberStreet, $subscriberAdressDetails, $subscriberPostalCode, $subscriberCity, $userPhoneNumber, $DLINumber, $DLIObtainingPlace, $DLIObtainingDate, $listOptionPM, $PIBankName, $PIHolderLastName, $PIHolderFirstName, $PIIBAN, $PIBIC, $checkConditions));
    }
}
else
{
    throw new Exception('Certains champs obligatoires n\'ont pas été remplis.');
}