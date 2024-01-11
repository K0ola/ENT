<?php
require_once 'src/layout/nav.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/root.css">
    <link rel="stylesheet" href="src/layout/styles/theme.css">
    <link rel="stylesheet" href="src/pages/profil/styles/profil.css">
    <title>Mes Paramètres</title>
</head>
<body class="Tropical-Blue">
    <a href="/parametre?view=profil">profil</a>
    <a href="/parametre?view=param">Paramètres</a>

    <main>

        <?php 
            if($_GET['view']=='profil') {
                require_once 'profil.php';
            } elseif ($_GET['view']== 'param') {
                require_once 'param.php';
            }
        ?>
        
    </main>
</body>
</html>