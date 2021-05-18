<?php
    $title = 'Liste des stations';

    $toPrint = StationVehicleDAO::printStationsByCity();

    require('views/view.php');