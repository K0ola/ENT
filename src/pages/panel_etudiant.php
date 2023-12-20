<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/styles/root.css">
    <link rel="stylesheet" href="./src/styles/nav.css">
    <link rel="stylesheet" href="./src/styles/panel_etudiant.css">
    <title>Panel Utilisateur</title>
</head>
<?php
    $requete =" SELECT * FROM utilisateurs";
    $stmt=$db->query($requete);
    $result=$stmt->fetchall(PDO::FETCH_ASSOC);
    ?>
<body>
    <header>
    <?php
    echo ("<h1>BIENVENUE " . $_SESSION["prenom"] . " sur votre ENT</h1>");
    ?>
    <img src="./src/assets/glob-earth.png" alt="" id='logo'>
    </header>
    <a href="./src/scripts/logout.php">Deconnection</a>

    <nav>
        <header>
            <a href=""><img src="./src/assets/glob-earth.png" alt="">Notifications</a>
            <a href=""><img src="./src/assets/glob-earth.png" alt="">Nom Prenom</a>
            <a href=""><img src="./src/assets/glob-earth.png" alt="">Recherche..</a>

        </header>
        <section>
            <a href="index.php">Accueil</a>
            <a href="">Agenda</a>
            <a href="">Communication</a>
            <a href="">Vie Scolaire <img src="./src/assets/arrow_right.png" alt=""></a>
            <a href="">Outils</a>
            <a href="">Cours</a>
            <a href="">Actualités</a>

        </section>
        <footer>
            <img src="./src/assets/param.png" alt="" id='parametres'>
            <a href="">Mentions légales</a>
        </footer>

    </nav>
</body>
</html>