
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="src/root.css">
    <link rel="stylesheet" href="src/layout/styles/theme.css">
    <link rel="stylesheet" href="src/pages/connexion/styles/connexion.css">
</head>
<body class="Tropical-Blue">
    <section id="connexion">
        <header>
            <img src="src/assets/Logo_Universite.svg" alt="Logo de l'université"/>
            <h1 class="txt_h1">ENT MMI - Champs sur Marne</h1>
            <!-- <h1 class="txt_h1">Connexion</h1> -->
        </header>
        <article>
            <p>Etudiants, enseignants, intervenants, personnel administratif, bienvenu sur votre enironnement numérique de travail MMI !</p>
            <form action="/connexion" method="POST">
                <div class="div_form">
                    <h2 class="txt_h2">Connexion</h2>
                    <div>
                        <label for="login" class="txt_bold">Identifiant</label>
                        <input type="text" class="input" name="login" id="login" required>
                    </div>
                    <div id='mdp'>
                        <label for="password" class="txt_bold">Mot de passe</label>
                        <input type="password" class="input" name="password" id="password" required>
                        <img src="src/assets/icon/Eye-off.svg" class="Icon_Medium" alt="Toggle Visibility" onclick="psswrdvisible()">
                    </div>
                    <a href="/mdp-forget" class="txt_micro">Mot de passe oublié ?</a>
                </div>
                <input type="submit" value="Connexion" id="btn_connexion">
            </form>
        </article>
    </section>
    <script src="src/layout/script/theme.js"></script>
    <script src="src/pages/connexion/script.js"></script>
</body>
</html>
