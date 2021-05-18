<?php 
    $title = 'Erreur';
    ob_start();
?>

<p><?= $errorMessage ?></p>

<?php 
    $content = ob_get_clean();
    require('template.php');
?>