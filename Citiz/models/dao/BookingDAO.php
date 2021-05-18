<?php

    abstract class BookingDAO
    {
// Calcul du prix sur la distance
        static function distancePrice($distance, $vehicleCategory)
        {
            $distancePrice = self::distancePriceData($distance, $vehicleCategory);

            if($distance <= 100)
            {
                return ($distance * $distancePrice->getDPInf100Km());
            }
            else
            {
                return (100 * $distancePrice->getDPInf100Km() + ($distance - 100) * $distancePrice->getDPSup100Km());
            }
        }

        static function getDistanceName($distance)
        {
            if($distance > 100)
            {
                $distanceName = '>100 km';
            }
            else
            {
                $distanceName = '<=100 km';
            }
            return $distanceName;
        }

        static function distancePriceData($distance, $vehicleCategory)
        {
            $distanceName = self::getDistanceName($distance);

            $db = DBConnexion::getConnexion('Visitor');
            $req = $db->prepare('SELECT * FROM distance_price WHERE VCCode = :vccode AND DistanceName = :distanceName');
            $req->bindValue(':vccode', $vehicleCategory);
            $req->bindValue(':distanceName', $distanceName);
            $req->execute();
            $data = $req->fetch(PDO::FETCH_ASSOC);

            return new DistancePrice($data);
        }

// Calcul du prix sur la durée
        static function durationPrice(DateTime $dateStart, DateTime $dateEnd, $vehicleCategory, $formulaName)
        {
            $hours = self::getHours($dateStart, $dateEnd);
            $days = self::getDays($dateStart, $dateEnd);
            $weeks = self::getWeeks($dateStart, $dateEnd);
            $price = 0;

            if($hours * self::getDP1Hour($vehicleCategory, $formulaName) > self::getDP1Day($vehicleCategory, $formulaName))
            {
                $days ++;
            }
            else
            {
                $price += $hours * self::getDP1Hour($vehicleCategory, $formulaName);
            }

            if($days * self::getDP1Day($vehicleCategory, $formulaName) > self::getDP1Week($vehicleCategory, $formulaName))
            {
                $weeks ++;
            }
            else
            {
                $price += $days * self::getDP1Day($vehicleCategory, $formulaName);
            }

            $price += $weeks * self::getDP1Week($vehicleCategory, $formulaName);

            return $price;
        }

        static function getHours(DateTime $dateStart, DateTime $dateEnd)
        {
            if($dateStart->format('H') > $dateEnd->format('H'))
            { // +16 car il y a 8 heures de nuit gratuites, de 23h à 7h
                return (($dateEnd->format('H') + 16) - $dateStart->format('H')); 
            }
            else
            {
                return $dateEnd->format('H') - $dateStart->format('H');
            }
        }

        static function getDays(DateTime $dateStart, DateTime $dateEnd)
        {
            $days = ($dateEnd->format('d') - $dateStart->format('d')) % 7;
            if($dateStart->format('H') > $dateEnd->format('H')) // Si l'heure de départ est plus grande que l'heure d'arrivée
            { // Il y a un jour non-complet donc on l'enlève
                return $days - 1;
            }
            else
            {
                return $days;
            }
        }

        static function getWeeks(DateTime $dateStart, DateTime $dateEnd)
        {
            return ((int) (($dateEnd->format('d') - $dateStart->format('d')) / 7));
        }

        static function getDP1Hour($vehicleCategory, $formulaName)
        {
            $durationName = '1 heure';

            $db = DBConnexion::getConnexion('Visitor');
            $req = $db->prepare('SELECT DP FROM duration_price WHERE VCCode = :vccode AND DurationName = :durationName AND FormulaName = :formulaName');
            $req->bindParam(':durationName', $durationName);
            $req->bindValue(':vccode', $vehicleCategory);
            $req->bindValue(':formulaName', $formulaName);
            $req->execute();
            $dp1Hour = $req->fetch();

            return $dp1Hour['DP'];
        }

        static function getDP1Day($vehicleCategory, $formulaName)
        {
            $durationName = '24 heures';

            $db = DBConnexion::getConnexion('Visitor');
            $req = $db->prepare('SELECT DP FROM duration_price WHERE VCCode = :vccode AND DurationName = :durationName AND FormulaName = :formulaName');
            $req->bindParam(':durationName', $durationName);
            $req->bindValue(':vccode', $vehicleCategory);
            $req->bindValue(':formulaName', $formulaName);
            $req->execute();
            $dp1Day = $req->fetch();
            
            return $dp1Day['DP'];
        }

        static function getDP1Week($vehicleCategory, $formulaName)
        {
            $durationName = '7 jours';

            $db = DBConnexion::getConnexion('Visitor');
            $req = $db->prepare('SELECT DP FROM duration_price WHERE VCCode = :vccode AND DurationName = :durationName AND FormulaName = :formulaName');
            $req->bindParam(':durationName', $durationName);
            $req->bindValue(':vccode', $vehicleCategory);
            $req->bindValue(':formulaName', $formulaName);
            $req->execute();
            $dp1Week = $req->fetch();
            
            return $dp1Week['DP'];
        }

        static function printSimulation($dateStart, $dateEnd, $distance, $vehicleCategory)
        {
            $dateStartO = new DateTime($dateStart, new DateTimeZone('Europe/Paris'));
            $dateEndO = new DateTime($dateEnd, new DateTimeZone('Europe/Paris'));

            $distancePrice = BookingDAO::distancePrice($distance, $vehicleCategory);

            $priceMini = $distancePrice + BookingDAO::durationPrice($dateStartO, $dateEndO, $vehicleCategory, 'Mini');
            $priceClassique = $distancePrice + BookingDAO::durationPrice($dateStartO, $dateEndO, $vehicleCategory, 'Classique');
            $priceFrequence = $distancePrice + BookingDAO::durationPrice($dateStartO, $dateEndO, $vehicleCategory, 'Fréquence');

            // Initialisation des variables de session au cas où la personne réserve
            $_SESSION['dateStart'] = $dateStart;
            $_SESSION['dateEnd'] = $dateEnd;
            $_SESSION['distance'] = $distance;
            $_SESSION['vehicle'] = $vehicleCategory;


            $toPrint = "<div>
                            <h3><strong>Récapitulatif</strong></h3>
                            <p><strong>Catégorie véhicule : </strong>" . $vehicleCategory . "</p>
                            <p><strong>Distance : </strong>" . $distance . " km</p>
                            <p><strong>Date de départ : </strong>" . $dateStartO->format('d/m/Y\, H\hi') . "</p>
                            <p><strong>Date d'arrivée : </strong>" . $dateEndO->format('d/m/Y\, H\hi') . "</p>
                        </div>";

            $toPrint .= "<p><strong>Carburant, assurance et entretien compris.</strong></p>
                            <form action='index.php' method='post'>
                                <button type='submit' class='buttonSimulation' value='loginView' name='buttonMenu'>
                                    <p>En formule Fréquence</p>
                                    <p>" . Utility::replaceDotByComma($priceFrequence) . "€ TTC</p>
                                </button><br><br>
                            
                                <button type='submit' class='buttonSimulation' value='loginView' name='buttonMenu'>
                                    <p>En formule Classique</p>
                                    <p>" . Utility::replaceDotByComma($priceClassique) . "€ TTC</p>
                                </button><br><br>
                            
                                <button type='submit' class='buttonSimulation' value='loginView' name='buttonMenu'>
                                    <p> En formule Mini</p>
                                    <p>" . Utility::replaceDotByComma($priceMini) . "€ TTC</p>
                                </button>
                            </form><br><br>";
            return $toPrint;
        }
    }