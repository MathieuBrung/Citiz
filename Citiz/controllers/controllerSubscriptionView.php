<?php

// Penser à mettre un message pour indiquer que l'inscritpion en tant qu'abonné doit être validée par une secrétaire

    $title = "Je m'abonne";

    $scripts = array(
        '<script src="public/js/controlSubscription.js"></script>',
        '<script src="public/js/lists.js"></script>',
        '<script src="public/js/Form.js"></script>'
    );

    $onload = 'listOptionsPaymentMode()';

    $toPrint = FormSubscription::formCreation();

    require('views/view.php');