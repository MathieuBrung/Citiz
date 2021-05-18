<?php

    $title = 'Accueil';

    $menuArray = array(
        'Inscription', 'registrationView',
        'Connexion', 'loginView',
        'Stations', 'stationsView',
        'Véhicules', 'vehiclesView',
        'Tarifs', 'pricesView',
        'Simulateur de tarif', 'pricesSimulationView',
        'Conditions générales de location', 'termsOfUseView'
    );

    $toPrint = FormMenu::formCreation($menuArray);

    require('views/view.php');