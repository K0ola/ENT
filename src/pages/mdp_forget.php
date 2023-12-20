<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe oublié</title>
</head>
<?php
include('../scripts/connexion_bdd.php');
session_start()

?>
<body>
    <h1>Réinitialisation Mot de passe</h1>
    <form action="../scripts/mail_request_change_mdp.php" method="POST">
        <input type='email' name="mail" id="mail">
        <input type="submit" value="Send">
    </form>

    
</body>
</html>