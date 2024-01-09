<?php
require_once 'src/layout/nav.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/root.css">
    <link rel="stylesheet" href="src/pages/profil/styles/profil.css">
    <title>Mon Profil</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
            <h1>Mon Profil</h1>
            <p>Prénom : <?= $prenom ?></p>
            <p>Nom : <?= $nom ?></p>
            <p>Login : <?= $login ?></p>
            <p>Rôle : <?= $role ?></p>
            <p>classe : <?php if($class == 1){
                echo "MMI 1 | TP - A";
            } else if($class == 2){
                echo "MMI 1 | TP - B";
            } else if($class == 3){
                echo "MMI 1 | TP - C";
            } else if($class == 4){
                echo "MMI 1 | TP - D";
            } else if($class == 5){
                echo "MMI 2 | TP - A";
            } else if($class == 6){
                echo "MMI 2 | TP - B";
            } else if($class == 7){
                echo "MMI 2 | TP - C";
            } else if($class == 8){
                echo "MMI 1 | TP - D";
            }?></p>
            </div>
        </div>
    </div>
</body>
</html>