<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="public/css/style.css">
    <?php if(isset($css)){echo $css;}?>
    
    <?php if(isset($scripts)){foreach($scripts as $script){echo $script;}}?>
    
    <title><?= $title; ?></title>
</head>
<body <?php if(isset($onload)){echo "onload='$onload'";}?>>

<?php unset($_SESSION['redirection']);?>

    <a href="index.php">
        <h1>Citiz - Bordeaux</h1>
    </a>

    <h2><?= $title;?></h2>

    <!-- Ajouter un echo menu ? -->

    <?= $content; ?>
    
</body>
</html>