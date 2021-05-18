<?php

    $title = 'Accueil secrétaire';

    $menuArray = array(
        'Stations', 'stationsView',
        'Véhicules', 'visitorVehiclesView',
        'Tarifs', 'pricesView',
        'Simulateur de tarif', 'pricesSimulationView',
        'Conditions générales de location', 'termsOfUseView'
    );

    $toPrint = FormMenu::formCreation($menuArray);

    require('views/view.php');