<?php
    ob_start();

    echo $toPrint;

    $content = ob_get_clean();
    require('views/template.php');
?>