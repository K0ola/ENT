<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/styles/root.css">
    <link rel="stylesheet" href="./src/styles/panel_admin.css">
    <title>Gestionnaire de comptes</title>
</head>
<?php
session_start();
include('../scripts/connexion_bdd.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $login = $_POST['login']; 
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
    $email = $_POST['email'];

    try {
        $sql = "INSERT INTO utilisateurs (prenom_utilisateur, nom_utilisateur, login, mot_de_passe, mail_utilisateur) VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([$prenom, $nom, $login, $password, $email]);
        echo "Nouvel enregistrement créé avec succès";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>

<body>
    <h1>Création d'un nouvel utilisateur</h1>
    <a href="../../index.php">Retour au dashboard</a>

    <form action="gestion_comptes.php" method="post">
        <label for="login">Login</label>
        <input type="text" name="login" id="login" required>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>

        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom" required>

        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" required>

        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" required>

        <input type="submit" value="Créer">
    </form>
    
</body>
</html>
