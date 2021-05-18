<?php

    $title = 'Envoie de fichier';

    $scripts = array(
        '<script src="public/js/controlUploadFiles.js"></script>',
        '<script src="public/js/lists.js"></script>'
    );

    $onload = 'listOptionsUploadedFiles()';

    $toPrint = FormUploadFiles::formCreation(1);

    require('views/view.php');