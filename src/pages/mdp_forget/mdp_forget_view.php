

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mot de passe oublié</title>
    <link rel="stylesheet" href="../../styles/root.css">
</head>
<body>
    <h1>Réinitialisation du mot de passe</h1>
    <form action="/mdp-forget" method="POST">
        <input type='email' name="mail" id="mail" required>
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>
