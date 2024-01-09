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
    <title>Mon Profil</title>
</head>
<body class="Tropical-Blue">
    <div class="container">
        <div class="row">
            <div class="col-12">
            <h1>Mon Profil</h1>
            <p>Prénom : <?= $prenom ?></p>
            <p>Nom : <?= $nom ?></p>
            <p>Login : <?= $login ?></p>
            <p>Rôle : <?= $role ?></p>
            <p>classe : <?= $class ?></p>
            </div>
        </div>
    </div>
</body>
</html>