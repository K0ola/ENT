<?php session_start() ?>

<link rel="stylesheet" href="src/layout/styles/header.css">
<nav>
    <header>
        <a href="/notifications"><img src="" alt="Notifications"></a>
        <a href="/profil"><img src="" alt="Mon Compte"></a>
        <a href="src/logout.php"><img src="" alt="Déconnexion"></a>
    </header>
    <section>
        <?php
        if ($_SESSION['role'] === 'admin') {
            echo "
            <a href=\"/dashboard\">Accueil</a>
            <a href=\"/gestion-comptes\">Gestion utilisateurs</a>
            <a href=\"/gestion-classes\">Gestion classes</a>
            <a href=\"/gestion-matieres\">Gestion matières</a>
            ";
        } else if ($_SESSION['role'] === 'prof') {
        } else if ($_SESSION['role'] === 'student') {
            echo "
            <a href=\"/dashboard\">Accueil</a>
            <a href=\"/agenda\">Agenda</a>
            <a href=\"/discussion\">Communication</a>
            <a href=\"/vie-scolaire\">Vie scolaire</a>
            <a href=\"/outils\">Outils</a>
            <a href=\"/cours\">Cours</a>
            <a href=\"/actualité\">Actualité</a>
            ";
        }
        ?>
    </section>

    <footer>
        <a href="/parametres">Param</a>
        <a href="/mentions-légales">Mentions légales</a>
    </footer>

</nav>