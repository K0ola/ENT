<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Utilisateur</title>
</head>
<?php
    include('../scripts/connexion_bdd.php');
    $requete =" SELECT * FROM utilisateurs";
    $stmt=$db->query($requete);
    $result=$stmt->fetchall(PDO::FETCH_ASSOC);
    ?>
<body>
    <h1>TU ES BIEN CONNECTE EN TANT QU'UTILISATEUR ...</h1>
    <?php
    echo ($_SESSION["login"]. "<br>")
    ?>
    <a href="../scripts/logout.php">Deconnection</a>
</body>
</html>