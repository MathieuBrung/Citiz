<?php

    abstract class VehicleDAO
    {
        static function getVehiclesBySVId($SVId)
        {
            $vehicles = [];

            $db = DBConnexion::getConnexion('Visitor');
            $req = $db->prepare('SELECT * FROM vehicle NATURAL JOIN vehicle_category WHERE SVId = :svId');
            $req->bindValue(':svId', $SVId);
            $req->execute();

            while($data = $req->fetch())
            {
                $vehicles[] = new Vehicle($data);
            }

            return $vehicles;
        }

        // SELECT * FROM station_vehicle NATURAL JOIN road NATURAL JOIN vehicle JOIN vehicle_category ON vehicle.VCCode = vehicle_category.VCCode AND station_vehicle.SVId = 38

        static function getVehiclesCategoriesByStation($station)
        {
            $vehicles = VehicleDAO::getVehiclesBySVId($station->getSVId());
            $categories = [];
            $count = 1;
            
            for($i = 0; $i < count($vehicles); $i++)
            {
                if($i < count($vehicles) - 1 && $vehicles[$i]->getVCCode() === $vehicles[$i+1]->getVCCode() && $vehicles[$i]->getVSName() === $vehicles[$i+1]->getVSName())
                {
                    $count++;
                }
                else
                {
                    $categories[] = $count . " x " . $vehicles[$i]->getVCCode() . " - " . $vehicles[$i]->getVCName() . " - " . $vehicles[$i]->getVSName();
                    $count = 1;
                }
            }
            return $categories;
        }

        static function getVehiclesCategories()
        {
            $categories = [];

            $db = DBConnexion::getConnexion('Visitor');
            $req = $db->prepare('SELECT * FROM vehicle_category');
            $req->execute();

            while($data = $req->fetch())
            {
                $categories[] = new VehicleCategory($data);
            }

            return $categories;
        }
    }