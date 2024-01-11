
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/root.css">
    <link rel="stylesheet" href="src/layout/styles/theme.css">
    <link rel="stylesheet" href="src/pages/connexion/styles/connexion.css">
    <title>Connexion</title>
</head>
<body class="Tropical-Blue">
    
    <script src="src/layout/script/theme.js"></script>

    <section id="background">

    </section>
    <section id="connexion">
        <header>
            <img src="src/assets/Logo_Universite.svg" alt="Logo de l'université"/>
            <h1 class="txt_h1">ENT MMI - Champs sur Marne</h1>
            <p>Etudiants, enseignants, intervenants, personnel administratif, bienvenue sur votre environnement numérique de travail MMI !</p>
            <!-- <h1 class="txt_h1">Connexion</h1> -->
        </header>
        
        <form action="/connexion" method="POST">
            <div class="div_form">
                <div>
                    <label for="login" class="txt_bold">Identifiant</label>
                    <input type="text" class="input" name="login" id="login" placeholder="prenom.nom" required>
                </div>
                <div id='mdp'>
                    <label for="password" class="txt_bold">Mot de passe</label>
                    <input type="password" class="input" name="password" id="password" placeholder="*************"  required>
                    <img src="src/assets/icon/Eye-off.svg" class="Icon_Medium" alt="Toggle Visibility" onclick="psswrdvisible()">
                </div>
                <a href="/mdp-forget" class="txt_micro">Mot de passe oublié ?</a>
            </div>
            <label class="connexionBTN_container txt_nav">
                <input type="submit" value="Connexion" id="btn_connexion">
                Connexion
                <div class="Icon_Large"></div>
            </label>
        </form>
    </section>
    <script src="src/pages/connexion/script.js"></script>
    <script src="src/layout/script/burger.js"></script>
</body>
</html>

