<?php
    $stationId = $_POST['buttonStation'];

    if(StationVehicleDAO::getSVType($stationId) === "road")
    {
        $road = StationVehicleDAO::getRoadBySVId($stationId);
        $address = StationVehicleDAO::getStationAdressForIFrame($road) ;

        $toPrint = StationVehicleDAO::printStationDetails($road);
        $title = $road->getSVPlace();
    }
    else
    {
        $parking = StationVehicleDAO::getParkingBySVId($stationId);
        $address = StationVehicleDAO::getStationAdressForIFrame($parking) ;
        
        $toPrint = StationVehicleDAO::printStationDetails($parking);
        $title = $parking->getSVPlace();
    }

    $menuArray = array(
        'Retour aux stations', 'stationsView'
    );

    $iFrame = '<iframe width="400" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=' . str_replace(",", "", str_replace(" ", "+", $address)) . '&z=14&output=embed"></iframe>';

    $toPrint .= $iFrame;
    $toPrint .= "<br><br>";
    $toPrint .= FormMenu::formCreation($menuArray);

    require('views/view.php');