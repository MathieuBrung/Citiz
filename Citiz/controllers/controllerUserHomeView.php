<?php

    $title = 'Accueil utilisateur';

    if(isset($_SESSION['subscriberId']) && $_SESSION['subscriberId'] >= 0)
    {
        // Menu pour les personnes qui ont envoyés le formulaire d'abonnement
        $menuArray = array(
            'Mes justificatifs', 'uploadFilesView',
            'Mon premier règlement', 'firstPaymentView',
            'Stations', 'stationsView',
            'Véhicules', 'vehiclesView',
            'Tarifs', 'pricesView',
            'Simulateur de tarif', 'pricesSimulationView',
            'Conditions générales de location', 'termsOfUseView',
            'Déconnexion', 'logout'
        );
    }
    else
    {
        // Menu pour accéder au formulaire d'abonnement
        $menuArray = array(
            'Abonnement', 'subscriptionView',
            'Stations', 'stationsView',
            'Véhicules', 'vehiclesView',
            'Tarifs', 'pricesView',
            'Simulateur de tarif', 'pricesSimulationView',
            'Conditions générales de location', 'termsOfUseView',
            'Déconnexion', 'logout'
        );
    }

    $toPrint = FormMenu::formCreation($menuArray);

    require('views/view.php');