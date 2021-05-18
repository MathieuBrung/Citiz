<?php

    $title = 'Conditions générales de location';

    $pdf = 'public/pdf/CGL.pdf';

    $text = "<p>
                Les conditions générales de location (CGL) précisent les responsabilités des opérateurs d'autopartage du réseau Citiz et celles des personnes physiques ou morales qui effectuent des locations de voitures au sein du réseau Citiz.
            </p>";

    $link = "<a href=" . $pdf . " target='_blank'>CGL du réseau Citiz au 1er janvier 2020</a>";

    $toPrint = $text;
    $toPrint .= $link;

    require('views/view.php');