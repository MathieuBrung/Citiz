<?php

    abstract class StationVehicleDAO
    {
        static function getSV()
        {
            // Récupère toutes les stations Citiz
            $stations = [];
            $stationsSort = [];
            $stations[] = self::getSVRoad();
            $stations[] = self::getSVParking();

            for($i = 0; $i < 2 ; $i++)
            {
                foreach($stations[$i] as $station)
                {
                    $stationsSort[] = $station;
                }
            }

            function sortId($a, $b){
                return $a->getSVId() > $b->getSVId();
            }
            usort($stationsSort, 'sortId');
            
            return $stationsSort;
        }

         static function getSVRoad()
        {
            // Récupère les stations se trouvant sur les routes
            $roads = [];
            $db = DBConnexion::getConnexion('Visitor');
            $req = $db->prepare('SELECT * FROM road NATURAL JOIN station_vehicle');
            $req->execute();

            while($data = $req->fetch(PDO::FETCH_ASSOC))
            {
                $roads[] = new Road($data);
            }
            return $roads;
        }

        static function getSVParking()
        {
            // Récupère les stations se trouvant dans des parkings
            $parkings = [];
            $db = DBConnexion::getConnexion('Visitor');
            $req = $db->prepare('SELECT * FROM parking NATURAL JOIN station_vehicle');
            $req->execute();
            
            while($data = $req->fetch(PDO::FETCH_ASSOC))
            {
                $parkings[] = new Parking($data);
            }
            return $parkings;
        }

        static function getSVType($svId)
        {
            $db = DBConnexion::getConnexion('Visitor');
            $req = $db->prepare('SELECT parkingId FROM parking NATURAL JOIN station_vehicle WHERE station_vehicle.SVId = :svId');
            $req->bindValue(':svId', $svId);
            $req->execute();

            if($req->fetch(PDO::FETCH_ASSOC))
            {
                return "parking";
            }
            else
            {
                return "road";
            }
        }

        static function getRoadBySVId($svId)
        {
            $db = DBConnexion::getConnexion('Visitor');
            $req = $db->prepare('SELECT * FROM road NATURAL JOIN station_vehicle WHERE station_vehicle.SVId = :svId');
            $req->bindValue(':svId', $svId);
            $req->execute();

            $data = $req->fetch(PDO::FETCH_ASSOC);
            $road = new Road($data);
            return $road;
        }

        static function getParkingBySVId($svId)
        {
            $db = DBConnexion::getConnexion('Visitor');
            $req = $db->prepare('SELECT * FROM parking NATURAL JOIN station_vehicle WHERE station_vehicle.SVId = :svId');
            $req->bindValue(':svId', $svId);
            $req->execute();

            $data = $req->fetch(PDO::FETCH_ASSOC);
            $parking = new Parking($data);
            return $parking;
        }

        static function getStationAdressForIFrame($station)
        {
            if(method_exists($station, 'getRoadId'))
            {
                return $station->getRoadAdress() . ", " . $station->getSVCity();
            }
            else
            {
                $SVPlace = $station->getSVPlace();
                $parkingName = preg_replace('#\((.+)\)#U', '', $SVPlace);
                return "Parking " . $parkingName . ", " . $station->getParkingAdress() . ", " . $station->getSVCity();
            }
        }

        static function printStationDetails($station)
        {
            $vehicles = VehicleDAO::getVehiclesCategoriesByStation($station);
            $tramStop = TramDAO::getTramStopBySVId($station->getSVId());
            $tramIFrame = TramDAO::getTramGoogleMapsLink($tramStop[0]);

            $table = "<table>
                            <tr>
                                <th>Ville</th>
                                <th>Lieu</th>
                                <th>Adresse</th>
                            </tr>
                            <tr>
                                <td>" . $station->getSVCity() . "</td>
                                <td>" . $station->getSVPlace() . "</td>";

                if(method_exists($station, 'getRoadId'))
                {
                    $table .= "<td>" . $station->getRoadAdress() . "</td>";                                
                }
                else //if(method_exists($station, 'getParkingId'))
                {
                    $table .= "<td>" . $station->getParkingAdress() . "</td>";
                }

            $table .= "</tr>
                    </table><br><br>";

            $table .= "<table>
                            <tr>
                                <th>Voiture(s)</th>
                            </tr>
                            <tr>
                                <td>";
                                for($i = 0; $i < count($vehicles); $i++)
                                {
                                    $table .= $vehicles[$i] . "<br>";
                                }
                    $table .="</td>
                            </tr>
                        </table><br><br>";

            $table .= "<table>
                            <tr>
                                <th>Arrêt de tram le plus proche</th>
                                <th>Ligne(s)</th>
                            </tr>
                            <tr>
                                <td>
                                    " . $tramStop[0]->getTSName() . "
                                </td>
                                <td>";
                                foreach($tramStop as $tramLine)
                                {
                                    $table .= $tramLine->getTLCode() . " ";
                                }
                    $table .= "</td>
                            </tr>
                        </table><br><br>";

            return $table;
        }

        static function getSVByCity($city)
        {
            $stations = [];
            $stationsSort = [];
            $stations[] = self::getSVRoadByCity($city);
            $stations[] = self::getSVParkingByCity($city);

            for($i = 0; $i < 2 ; $i++)
            {
                foreach($stations[$i] as $station)
                {
                    $stationsSort[] = $station;
                }
            }
            
            usort($stationsSort, Utility::sortBySVId());

            return $stationsSort;
        }

        static function getSVCities()
        {
            $cities = [];
            $db = DBConnexion::getConnexion('Visitor');
            $req = $db->prepare('SELECT DISTINCT SVCity FROM station_vehicle');
            $req->execute();
            
            while($data = $req->fetch(PDO::FETCH_ASSOC))
            {
                $cities[] = $data;
            }
            return $cities;
        }

        static function getSVRoadByCity($city)
        {
            // Récupère les stations se trouvant sur les routes par rapport à la ville
            $roads = [];
            $db = DBConnexion::getConnexion('Visitor');
            $req = $db->prepare('SELECT * FROM road NATURAL JOIN station_vehicle WHERE SVCity = :svCity');
            $req->bindValue(':svCity', $city);
            $req->execute();

            while($data = $req->fetch(PDO::FETCH_ASSOC))
            {
                $roads[] = new Road($data);
            }
            return $roads;
        }

        static function getSVParkingByCity($city)
        {
            // Récupère les stations se trouvant dans des parkings par rapport à la ville
            $parkings = [];
            $db = DBConnexion::getConnexion('Visitor');
            $req = $db->prepare('SELECT * FROM parking NATURAL JOIN station_vehicle WHERE SVCity = :svCity');
            $req->bindValue(':svCity', $city);
            $req->execute();

            while($data = $req->fetch(PDO::FETCH_ASSOC))
            {
                $parkings[] = new Parking($data);
            }
            return $parkings;
        }

        static function printStationsByCity()
        {
            $toPrint = "";
            $cities = self::getSVCities();

            foreach($cities as $city)
            {
                $stations = self::getSVByCity($city['SVCity']);
                $toPrint .= self::preparePrintStationsByCity($stations, $city['SVCity']);
            }
            return $toPrint;
        }

        static function preparePrintStationsByCity (array $stations, $city)
        {
            $table = "<form action='index.php' method='post'>
                        <fieldset>
                        <legend><strong>" . $city . "</strong></legend>";
            
            foreach($stations as $station)
            {
                $table .= "<button value=" . $station->getSVId() . " name='buttonStation'>" . $station->getSVPlace() . "</button><br>";

            }

            $table .= "</fieldset>
                    </form>";

            return $table;
        }

        
        // static function printStationsV2(array $stations)
        // {
        //     $table = "<table>
        //                     <tr>
        //                         <th>Ville</th>
        //                         <th>Lieu</th>
        //                         <th>Adresse</th>
        //                         <th>Nombre de voiture</th>
        //                     </tr>";

        //         foreach($stations as $station)
        //         {
        //             $table .= "<tr>
        //                             <td>" . $station->getSVCity() . "</td>
        //                             <td>" . $station->getSVPlace() . "</td>";
        //             if(method_exists($station, 'getRoadId'))
        //             {
        //                 $table .= "<td>" . $station->getRoadAdress() . "</td>
        //                             <td>" . $station->getRoadSpacesNumber() . "</td>";
        //             }
        //             else //if(method_exists($station, 'getParkingId'))
        //             {
        //                 $table .= "<td>" . $station->getParkingAdress() . "</td>
        //                             <td>" . $station->getParkingSpacesNumber() . "</td>";
        //             }
        //             $table .= "<td><button value=" . $station->getSVId() . " name='button'>Plus d'informations</button></td>";
        //             $table .= "</tr>";

        //         }

        //     $table .= "</table>";

        //     return $table;
        // }

        // static function printStationDetails($station)
        // {
        //     $table = "<table>
        //                     <tr>
        //                         <th>Ville</th>
        //                         <th>Lieu</th>
        //                         <th>Adresse</th>
        //                         <th>Nombre de voiture</th>
        //                         <th>Catégorie</th>
        //                         <th>Immatriculation</th>
        //                         <th>Kilométrage</th>
        //                         <th>Niveau d'essence</th>
        //                     </tr>
        //                     <tr>
        //                         <td>" . $station->getSVCity() . "</td>
        //                         <td>" . $station->getSVPlace() . "</td>";

        //         if(method_exists($station, 'getRoadId'))
        //         {
        //             $table .= "<td>" . $station->getRoadAdress() . "</td>
        //                         <td>" . $station->getRoadSpacesNumber() . "</td>";
        //         }
        //         else //if(method_exists($station, 'getParkingId'))
        //         {
        //             $table .= "<td>" . $station->getParkingAdress() . "</td>
        //                         <td>" . $station->getParkingSpacesNumber() . "</td>";
        //         }

        //         $table .= "<td></td>
        //                     <td></td>
        //                     <td></td>
        //                     <td></td>
        //                 </tr>";

        //             $vehicles = VehicleDAO::getVehiclesBySVId($station->getSVId());
        //             foreach($vehicles as $vehicle)
        //             {
        //                 $table .= "<tr>
        //                             <td></td>
        //                             <td></td>
        //                             <td></td>
        //                             <td></td>
        //                             <td>" . $vehicle->getVCCode() ." - " . $vehicle->getVCName() . "</td>
        //                             <td>" . $vehicle->getVehicleRegistration() ."</td>
        //                             <td>" . $vehicle->getVehicleMileage() ." km</td>
        //                             <td>" . $vehicle->getVehicleFuelLevel() ."%</td>
        //                         </tr>";
        //             }

        //     $table .= "</table>";

        //     return $table;
        // }
    }