<?php

    abstract class DriverLicenseInformationDAO
    {
        static function addDLIBySubId(DriverLicenseInformation $DLI)
        {
            $db = DBConnexion::getConnexion('Admin');
            $req = $db->prepare('INSERT INTO driver_license_information (DLINumber, DLIObtainingPlace, DLIObtainingDate, SubscriberId)
                                    VALUES (:DLINumber, :DLIObtainingPlace, :DLIObtainingDate, :SubscriberId)');
            
            $DLINumber = $DLI->getDLINumber();
            $DLIObtainingPlace = $DLI->getDLIObtainingPlace();
            $DLIObtainingDate = $DLI->getDLIObtainingDate();
            $SubscriberId = $DLI->getSubscriber()->getSubscriberId();
            
            $req->bindValue(':DLINumber', $DLINumber);
            $req->bindValue(':DLIObtainingPlace', $DLIObtainingPlace);
            $req->bindValue(':DLIObtainingDate', $DLIObtainingDate);
            $req->bindValue(':SubscriberId', $SubscriberId);

            return $req->execute();
        }
    }