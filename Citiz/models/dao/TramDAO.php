<?php

    abstract class TramDAO
    {
        static function getTramStops()
        {
            $tramStops = [];
            $db = DBConnexion::getConnexion('Visitor');
            $req = $db->prepare('SELECT * FROM tram_stop NATURAL JOIN near NATURAL JOIN serve');
            $req->execute();

            while($data = $req->fetch(PDO::FETCH_ASSOC))
            {
                $tramStops[] = new Tram($data);
            }
            return $tramStops;
        }

        static function getTramStopBySVId($SVId)
        {
            $tramStop = [];
            $db = DBConnexion::getConnexion('Visitor');
            $req = $db->prepare('SELECT * FROM tram_stop NATURAL JOIN near NATURAL JOIN serve WHERE near.SVId = :SVId');
            $req->bindValue(':SVId', $SVId);
            $req->execute();

            while($data = $req->fetch(PDO::FETCH_ASSOC))
            {
                $tramStop[] = new Tram($data);
            }
            return $tramStop;
        }

        static function getTramGoogleMapsLink($tram)
        {
            return "tram+" . $tram->getTSName() . "+" . $tram->getTSCity();
        }
    }