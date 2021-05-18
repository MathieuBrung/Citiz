<?php

    abstract class PaymentInformationDAO
    {
        static function addPIBySubId(PaymentInformation $PI)
        {
            $db = DBConnexion::getConnexion('Admin');
            $req = $db->prepare('INSERT INTO payment_information (PIIBAN, PIBIC, PIHolderLastName, PIHolderFirstName, PIBankName, SubscriberId)
                                    VALUES (:PIIBAN, :PIBIC, :PIHolderLastName, :PIHolderFirstName, :PIBankName, :SubscriberId)');
            
            $PIIBAN = $PI->getPIIBAN();
            $PIBIC = $PI->getPIBIC();
            $PIHolderLastName = $PI->getPIHolderLastName();
            $PIHolderFirstName = $PI->getPIHolderFirstName();
            $PIBankName = $PI->getPIBankName();
            $SubscriberId = $PI->getSubscriber()->getSubscriberId();
            
            $req->bindValue(':PIIBAN', $PIIBAN);
            $req->bindValue(':PIBIC', $PIBIC);
            $req->bindValue(':PIHolderLastName', $PIHolderLastName);
            $req->bindValue(':PIHolderFirstName', $PIHolderFirstName);
            $req->bindValue(':PIBankName', $PIBankName);
            $req->bindValue(':SubscriberId', $SubscriberId);

            return $req->execute();
        }
    }