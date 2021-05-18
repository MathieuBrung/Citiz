<?php

    $title = 'Simulateur de tarifs';

    if(isset($_SESSION['connect']) && $_SESSION['connect'] == true)
    {
        $menuArray = array();
    }
    else
    {
        $menuArray = array(
            'Inscription', 'registrationView',
            'Connexion', 'loginView'
        );
    }

    $date = new DateTime(date('Y-m-d').'T'.date('H:i'));
    $date1hour = clone $date;
    $date1hour->modify('+1 hour');

    $dateStart = $date->format('Y-m-d') . 'T' . $date->format('H:i');
    $dateEnd = $date1hour->format('Y-m-d') . 'T' . $date1hour->format('H:i');

    $toPrint = FormMenu::formCreation($menuArray);
    $toPrint .= '<br>';
    $toPrint .= FormPricesSimulation::formCreation($dateStart, $dateEnd);

    require('views/view.php');