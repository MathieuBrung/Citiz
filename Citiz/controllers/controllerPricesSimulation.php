<?php
    $title = 'Mon trajet';

    // Calcul de simulation
    if(isset($_POST))
    {
        extract($_POST);
        if(FormPricesSimulation::formController($vehicle, $dateStart, $distance) === true)
        {
            $toPrint = BookingDAO::printSimulation($dateStart, $dateEnd, $distance, $vehicle);
        }
        else
        {
            throw new Exception(FormPricesSimulation::formController($vehicle, $dateStart, $distance));
        }
    }

    $menuArray = array(
        'Nouvelle simulation', 'pricesSimulationView'
    );

    $toPrint .= FormMenu::formCreation($menuArray);

    require('views/view.php');
