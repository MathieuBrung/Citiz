<?php

    $title = 'Tarifs';

    $priceFormula = "<img src='public\img\Formules tarifaires.png' alt='Tarifs formules' class='' width='50%'><br>";
    $priceSML = "<img src='public\img\Tarifs de S à L.png' alt='Tarifs formules' class='' width='50%'><br>";
    $priceXLXXL = "<img src='public\img\Tarifs de XL à XXL.png' alt='Tarifs formules' class='' width='50%'>";

    $toPrint = $priceFormula;
    $toPrint .= $priceSML;
    $toPrint .= $priceXLXXL;

    require('views/view.php');