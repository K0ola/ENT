
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="src/root.css">
    <link rel="stylesheet" href="src/layout/styles/theme.css">
    <link rel="stylesheet" href="src/pages/connexion/styles/connexion.css">
</head>
<body class="Tropical-Blue">
    <section id="connexion">
        <header>
            <h1>Connexion</h1>
            <!-- <img src="" alt="Logo"> -->
        </header>
        <div>
            <form action="/connexion" method="POST">
                <div>
                    <label for="login">Identifiant</label>
                    <input type="text" name="login" id="login" required>
                </div>
                <div id='mdp'>
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" required>
                    <img src="src/assets/not-visible.png" alt="Toggle Visibility" onclick="psswrdvisible()">
                </div>
                <a href="/mdp-forget">Mot de passe oublié ?</a>
                <input type="submit" value="Connexion" id="btn_connexion">
            </form>
        </div>
    </section>
    <script src="src/pages/connexion/script.js"></script>
</body>
</html>
