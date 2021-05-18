<?php

    abstract class SubscriberDAO
    {
        static function getSubscribers()
        {
            $subscribers = [];
            // Récupération du type dans les paramètres ?
            // Paramètre 'Admin' provisoire, il faudra le passer à 'Visitor' lorsque les comptes de la bdd seront créés
            $req = DBConnexion::getConnexion('Visitor')->query('SELECT UserEmail, UserLastName, UserFirstName, UserPhoneNumber, SubscriberId, SubscriberDateOfBirth, SubscriberGender, SubscriberStreet, SubscriberAdressDetails, SubscriberCity, SubscriberPostalCode, PMCode, FormulaName FROM user NATURAL JOIN subscriber');

            while($data = $req->fetch(PDO::FETCH_ASSOC))
            {
                $subscribers[] = new User($data);
            }

            return $subscribers;
        }

        static function getSubscriberIdByEmail($email)
        {
            $db = DBConnexion::getConnexion('Admin');
            $req = $db->prepare('SELECT SubscriberId FROM subscriber NATURAL JOIN user WHERE UserEmail = :UserEmail');
            $req->bindValue(':UserEmail', $email);
            $req->execute();

            $data = $req->fetch();
            return $data['SubscriberId'];
        }

        static function addSubscriber(Subscriber $subscriber)
        {

            // Ajout de la vérification du type d'utilisateur ?
            $db = DBConnexion::getConnexion('Admin');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->beginTransaction();

            $req = $db->prepare('INSERT INTO user(UserEmail, UserLastName, UserFirstName, UserPhoneNumber, UserPassword, UTCode) 
                                                                VALUES (:UserEmail, :UserLastName, :UserFirstName, :UserPhoneNumber, :UserPassword, :UTCode)');

            $req2 = $db->prepare('INSERT INTO subscriber(SubscriberDateOfBirth, SubscriberGender, SubscriberStreet, SubscriberAdressDetails, SubscriberCity, SubscriberPostalCode, PMCode, FormulaName, UserEmail) 
                                                                VALUES (:SubscriberDateOfBirth, :SubscriberGender, :SubscriberStreet, :SubscriberAdressDetails, :SubscriberCity, :SubscriberPostalCode, :PMCode, :FormulaName, :SubscriberEmail)');

            $subscriberEmail = $subscriber->getUserEmail();
            $subscriberLastName = $subscriber->getUserLastName();
            $subscriberFirstName = $subscriber->getUserFirstName();
            $subscriberPhoneNumber = $subscriber->getUserPhoneNumber();
            $subscriberPassword = $subscriber->getUserPassword();
            $UTCode = $subscriber->getUTName();

            $subscriberDateOfBirth = $subscriber->getSubscriberDateOfBirth();
            $subscriberGender = $subscriber->getSubscriberGender();
            $subscriberStreet = $subscriber->getSubscriberStreet();
            $subscriberAdressDetails = $subscriber->getSubscriberAdressDetails();
            $subscriberCity = $subscriber->getSubscriberCity();
            $subscriberPostalCode = $subscriber->getSubscriberPostalCode();
            $PMCode = $subscriber->getPaymentMode();
            $FormulaName = $subscriber->getFormula();;

            $req->bindValue(':UserEmail', $subscriberEmail);
            $req->bindValue(':UserLastName', $subscriberLastName);
            $req->bindValue(':UserFirstName', $subscriberFirstName);
            $req->bindValue(':UserPhoneNumber', $subscriberPhoneNumber);
            $req->bindValue(':UserPassword', md5($subscriberPassword));
            $req->bindValue(':UTCode', $UTCode);
            $req->execute();

            $req2->bindValue(':SubscriberDateOfBirth', $subscriberDateOfBirth);
            $req2->bindValue(':SubscriberGender', $subscriberGender);
            $req2->bindValue(':SubscriberStreet', $subscriberStreet);
            $req2->bindValue(':SubscriberAdressDetails', $subscriberAdressDetails);
            $req2->bindValue(':SubscriberCity', $subscriberCity);
            $req2->bindValue(':SubscriberPostalCode', $subscriberPostalCode);
            $req2->bindValue(':PMCode', $PMCode);
            $req2->bindValue(':FormulaName', $FormulaName);
            $req2->bindValue(':SubscriberEmail', $subscriberEmail);
            $req2->execute();
            
            if(!$db->commit())
            {
                $db->rollBack();
                throw new Exception('Erreur : Ajout du compte abonné impossible.');
            }
            else
            {
                return true;
            }
        }

        static function addSub(Subscriber $subscriber)
        {

            // Ajout de la vérification du type d'utilisateur ?
            $db = DBConnexion::getConnexion('Admin');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->beginTransaction();

            $req = $db->prepare('UPDATE user SET UserPhoneNumber = :UserPhoneNumber WHERE UserEmail = :UserEmail');

            $req2 = $db->prepare('INSERT INTO subscriber(SubscriberDateOfBirth, SubscriberGender, SubscriberStreet, SubscriberAdressDetails, SubscriberCity, SubscriberPostalCode, PMCode, InscriptionName, FormulaName, UserEmail) 
                                                                VALUES (:SubscriberDateOfBirth, :SubscriberGender, :SubscriberStreet, :SubscriberAdressDetails, :SubscriberCity, :SubscriberPostalCode, :PMCode, :InscriptionName, :FormulaName, :UserEmail)');

            $userEmail = $subscriber->getUserEmail();
            $userPhoneNumber = $subscriber->getUserPhoneNumber();

            $subscriberDateOfBirth = $subscriber->getSubscriberDateOfBirth();
            $subscriberGender = $subscriber->getSubscriberGender();
            $subscriberStreet = $subscriber->getSubscriberStreet();
            $subscriberAdressDetails = $subscriber->getSubscriberAdressDetails();
            $subscriberCity = $subscriber->getSubscriberCity();
            $subscriberPostalCode = $subscriber->getSubscriberPostalCode();
            $PMCode = $subscriber->getPaymentMode()->getPMName();
            $InscriptionName = $subscriber->getInscription()->getInscriptionName();
            $FormulaName = $subscriber->getFormula()->getFormulaName();

            $req->bindValue(':UserEmail', $userEmail);
            $req->bindValue(':UserPhoneNumber', $userPhoneNumber);
            $req->execute();

            $req2->bindValue(':SubscriberDateOfBirth', $subscriberDateOfBirth);
            $req2->bindValue(':SubscriberGender', $subscriberGender);
            $req2->bindValue(':SubscriberStreet', $subscriberStreet);
            $req2->bindValue(':SubscriberAdressDetails', $subscriberAdressDetails);
            $req2->bindValue(':SubscriberCity', $subscriberCity);
            $req2->bindValue(':SubscriberPostalCode', $subscriberPostalCode);
            $req2->bindValue(':PMCode', $PMCode);
            $req2->bindValue(':InscriptionName', $InscriptionName);
            $req2->bindValue(':FormulaName', $FormulaName);
            $req2->bindValue(':UserEmail', $userEmail);
            $req2->execute();

            // Récupération de l'id avant le commit sinon ça renvoit 0
            $id = $db->lastInsertId();
            
            if(!$db->commit())
            {
                $db->rollBack();
                throw new Exception('Erreur : Ajout du compte abonné impossible.');
            }
            else
            {
                return $id;
            }
        }
    }