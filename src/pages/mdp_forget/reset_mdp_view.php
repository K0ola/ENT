

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réinitialiser le mot de passe</title>
    <link rel="stylesheet" href="../../styles/root.css">
</head>
<body class="Tropical-Blue">
    <h1>Réinitialiser le mot de passe</h1>
    <form action="/reset" method="POST">
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">
        <input type="password" name="new_password" id="new_password" placeholder="Nouveau mot de passe" required>
        <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirmez le mot de passe" required>
        <input type="submit" value="Réinitialiser">
    </form>
</body>
</html>
