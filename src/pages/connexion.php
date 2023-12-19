<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion ENT</title>
</head>

<body>
    <h1>Page de connexion</h1>
    <?php
    $new_psswrd=password_hash("admin",PASSWORD_DEFAULT);
    echo $new_psswrd;

    if(isset($_GET["err"])){
        echo "<p>Erreur de connexion</p>";
    }
    ?>
    <form action="./src/scripts/login.php">
        <label for="login">Login</label>
        <input type="text" name="login" id="login" required>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>
        <input type="submit" value="Se connecter">
    
</body>
</html>