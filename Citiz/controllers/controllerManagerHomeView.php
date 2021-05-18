<?php

    $title = 'Accueil manager';

    $menuArray = array(
        'Stations', 'stationsView',
        'Véhicules', 'visitorVehiclesView',
        'Tarifs', 'pricesView',
        'Simulateur de tarif', 'pricesSimulationView'
    );

    $toPrint = FormMenu::formCreation($menuArray);

    require('views/view.php');