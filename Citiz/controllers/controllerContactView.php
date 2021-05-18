<?php

    $title = 'Contact';

    $scripts = array(
        '<script src="public/js/controlContact.js"></script>',
        '<script src="public/js/lists.js"></script>'
    );

    $onload = 'listOptionsContact()';

    $toPrint = FormContact::formCreation();

    require('views/view.php');