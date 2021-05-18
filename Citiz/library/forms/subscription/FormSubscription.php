<?php

    abstract class FormSubscription
    {
        // Faire une sous-fonction par "mini" formulaire, par fieldset
        static function formCreation()
        {
            $form = "<form action='index.php' method='post' id='form'>";
            $form .= self::fieldInscriptionType();
            $form .= self::fieldFormulaChoice();
            $form .= self::fieldPersonnalInformations();
            $form .= self::fieldDriverLicenseInformations();
            $form .= "<br>";
            $form .= self::fieldPaymentMode();            
            $form .= self::fieldCheckConditions();
            $form .= "<br>";
            $form .= self::fieldRedirectionParagraph();
            $form .= self::fieldSubmit();
            $form .= "</form>";

            return $form;
        }

        static function formController($inscriptionName, $formulaName, $subscriberGender, $subscriberDateOfBirth, $subscriberStreet, $subscriberAdressDetails, $subscriberPostalCode, $subscriberCity, $userPhoneNumber, $DLINumber, $DLIObtainingPlace, $DLIObtainingDate, $listOptionPM, $PIBankName, $PIHolderLastName, $PIHolderFirstName, $PIIBAN, $PIBIC, $checkConditions)
        {
            // Vérification du type d'inscription
            if(ControlSubscription::controlInscriptionName($inscriptionName))
            {
                // Vérification du choix de la formule
                if(ControlSubscription::controlFormulaChoice($formulaName))
                {
                // Vérifications sur les informations personnelles
                    // Genre
                    if(ControlGender::control($subscriberGender))
                    {
                        // Date de naissance (>= 18ans)
                        if(ControlDateOfBirth::control($subscriberDateOfBirth))
                        {
                            // Rue ? Controle sur la longueur ? Correspondant à la longueur max du champ dans la bdd ?
                            // Compléments ?

                            // Code Postal
                            if(ControlPostalCode::control($subscriberPostalCode))
                            {
                                // Ville ?

                                // Téléphone mobile
                                if(ControlPhoneNumber::control($userPhoneNumber))
                                {
                                // Vérifications sur le permis de conduire
                                    // Numéro de permis (longueur ?)
                                    if(ControlDriverLicence::controlNumber($DLINumber))
                                    {
                                        // Lieu d'obtention ?

                                        // Date d'obtention (au moins 18 ans après la date de naissance)
                                        if(ControlDriverLicence::controlObtainingDate($DLIObtainingDate, $subscriberDateOfBirth))
                                        {
                                        // Vérification sur le mode de paiement
                                            // Si Virement
                                            if($listOptionPM == 'Virement')
                                            {
                                                // Nom de la banque ?

                                                // Nom
                                                if(ControlLastName::control($PIHolderLastName))
                                                {
                                                    // Prénom
                                                    if(ControlFirstName::control($PIHolderFirstName))
                                                    {
                                                        // IBAN (longueur et forme ?)
                                                        if(ControlIBAN::control($PIIBAN))
                                                        {
                                                            // BIC (longueur et forme ?)
                                                            if(ControlBIC::control($PIBIC))
                                                            {
                                                                // Vérification sur la checkbox
                                                                if(ControlCheckBox::control($checkConditions))
                                                                {
                                                                    return true;
                                                                }
                                                                else
                                                                {
                                                                    $error = 'Les conditions de location doivent être acceptée pour pouvoir utiliser nos services.';
                                                                }
                                                            }
                                                            else
                                                            {
                                                                $error = 'Erreur sur le BIC';
                                                            }
                                                        }
                                                        else
                                                        {
                                                            $error = 'Erreur sur l\'IBAN';
                                                        }
                                                    }
                                                    else
                                                    {
                                                        $error = 'Erreur sur le prénom';
                                                    }
                                                }
                                                else
                                                {
                                                    $error = 'Erreur sur le nom de famille';
                                                }
                                            }
                                            else
                                            {
                                                // Vérification sur la checkbox
                                                if(ControlCheckBox::control($checkConditions))
                                                {
                                                    return true;
                                                }
                                                else
                                                {
                                                    $error = 'Les conditions de location doivent être acceptée pour pouvoir utiliser nos services.';
                                                }
                                            }
                                        }
                                        else
                                        {
                                            $error = 'La date d\'obtention de votre permis de conduire ne peut être inférieure à 18 ans parès votre date de naissance.';
                                        }
                                    }
                                    else
                                    {
                                        $error = 'Erreur sur le numéro de permis';
                                    }
                                }
                                else
                                {
                                    $error = 'Erreur sur le numéro de téléphone';
                                }
                            }
                            else
                            {
                                $error = 'Erreur sur le code postal';
                            }
                        }
                        else
                        {
                            $error = 'Vous devez avoir plus de 18 ans pour pouvoir vous abonner au services de Citiz.';
                        }
                    }
                    else
                    {
                        $error = 'Erreur sur le genre';
                    }
                }
                else
                {
                    $error = 'Erreur sur la formule choisie.';
                }
            }
            else
            {
                $error = 'Erreur sur le type d\'inscription.';
            }
            return $error;
        }

        static function fieldInscriptionType()
        {
            $field = "<fieldset>
                        <legend>Type d'inscription</legend>
                        <input type='radio' name='inscriptionName' id='' value='Coopérative'>
                        <label for='inscriptionName'>Coopérative</label><br>
                        <input type='radio' name='inscriptionName' id='' value='Standard'>
                        <label for='inscriptionName'>Standard</label>
                    </fieldset><br>";

            return $field;
        }

        static function fieldFormulaChoice()
        {
            $field = "<fieldset>
                        <legend>Choix de la formule</legend>
                        <input type='radio' name='formulaName' id='' value='Fréquence'>
                        <label for='formulaName'>Fréquence</label><br>
                        <input type='radio' name='formulaName' id='' value='Classique'>
                        <label for='formulaName'>Classique</label><br>
                        <input type='radio' name='formulaName' id='' value='Mini'>
                        <label for='formulaName'>Mini</label>
                    </fieldset><br>";

            return $field;
        }

        static function fieldPersonnalInformations()
        {
            $field = "<fieldset>
                        <legend>Informations personnelles</legend>
                        <span>Genre</span><br>
                        <input type='radio' name='subscriberGender' id='' value='Homme'>
                        <label for='SubscriberGender'>Homme</label><br>
                        <input type='radio' name='subscriberGender' id='' value='Femme'>
                        <label for='SubscriberGender'>Femme</label><br>

                        <label for='subscriberDateOfBirth'>Date de naissance</label><br>
                        <input type='date' name='subscriberDateOfBirth' id=''><br>
                
                    <!-- Longueur max à 100 -->
                        <label for='subscriberStreet'>Rue</label><br>
                        <input type='text' name='subscriberStreet' id=''><br>
                
                    <!-- Longueur max à 255 -->
                        <label for='subscriberAdressDetails'>Compléments</label><br>
                        <input type='text' name='subscriberAdressDetails' id=''><br>
                
                    <!-- Longueur maximale à 5 -->
                        <label for='subscriberPostalCode'>Code postal</label><br>
                        <input type='text' name='subscriberPostalCode' id=''><br>
                
                    <!-- Longueur max à 100 -->
                        <label for='subscriberCity'>Ville</label><br>
                        <input type='text' name='subscriberCity' id=''><br>
                
                    <!-- regex pour tel mobile -->
                        <label for='userPhoneNumber'>Téléphone mobile</label><br>
                        <input type='text' name='userPhoneNumber' id=''>
                    </fieldset><br>";

            return $field;
        }

        static function fieldDriverLicenseInformations()
        {
            $field = "<fieldset>
                        <legend>Permis de conduire</legend>
                        <label for='DLINumber'>Numéro de permis</label><br>
                        <input type='text' name='DLINumber' id=''><br>

                        <label for='DLIObtainingPlace'>Lieu d'obtention</label><br>
                        <input type='text' name='DLIObtainingPlace' id=''><br>

                        <label for='DLIObtainingDate'>Date d'obtention</label><br>
                        <input type='date' name='DLIObtainingDate' id=''>
                    </fieldset><br>";
            return $field;
        }

        static function fieldPaymentMode()
        {
            $field = "<label for='listOptionPM' class=''>Mode de paiement </label>
                        <select name='listOptionPM' class='' id='listOptionPM' required onchange='switchPM()'></select><br>
                        <div id='PMForm'></div><br><br>";
            return $field;
        }
        
        static function fieldCheckConditions()
        {
            $pdf = 'public/pdf/CGL.pdf';
            $field = "<input type='checkbox' name='checkConditions' id=''>
                        <label for='checkConditions'>J'accèpte les <a href=" . $pdf . " target='_blank'>Conditions générales de location</a></label><br>";
            return $field;
        }

        static function fieldRedirectionParagraph()
        {
            return "<p>Une fois le formulaire envoyé, nous vous invitons à aller dans l'onglet \"Mes justificatifs\" afin de nous transmettre les documents obligatoires à la validation de votre abonnement ainsi qu'à vous rendre dans l'onglet \"Mon premier règlement\" afin d'y procéder.</p>";
        }
        
        static function fieldSubmit()
        {
            $field = "<input type='hidden' name='formName' value='subscription'>
                        <span class='' id='errorMessageSubscription'></span><br>
                        <input type='submit' value='Abonnement' class='' id='submitSubscription' onsubmit='controlSubscriptionForm()'>";
            return $field;
        }
    }