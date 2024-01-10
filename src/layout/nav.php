<?php session_start()?>

<link rel="stylesheet" href="src/layout/styles/nav.css">
<link rel="stylesheet" href="theme.css">
<nav class="txt_nav">
    <header>
        <!-- <a href="/notifications"><img src="" alt="Notifications"></a> -->
        <a href="/profil" class="Nav_profil noDeco"><img class="Icon_Larger" src="src/assets/user/user_icon.png" alt="Mon Compte" title="Mon Compte"><p><?= $_SESSION['prenom'] ?> <?= $_SESSION['nom'] ?></p></a>
        <a href="src/logout.php"><img src="" alt="Déconnexion"></a>
    </header>
    <hr/>
    <section>
        <?php
        if ($_SESSION['role'] === 'admin') {
            echo "
            <a href=\"/dashboard\" class=\"noDeco\">Accueil</a>
            <a href=\"/gestion-comptes\" class=\"noDeco\">Gestion utilisateurs</a>
            <a href=\"/gestion-classes\" class=\"noDeco\">Gestion classes</a>
            <a href=\"/gestion-matieres\" class=\"noDeco\">Gestion matières</a>
            ";
        } else if ($_SESSION['role'] === 'prof') {
        } else if ($_SESSION['role'] === 'student') {
            echo "
            <a href=\"/dashboard\" class=\"noDeco\">Accueil</a>
            <a href=\"/agenda\" class=\"noDeco\">Agenda</a>
            <a href=\"/discussion\" class=\"noDeco\">Communication</a>
            <a href=\"/vie-scolaire\" class=\"noDeco\">Vie scolaire</a>
            <a href=\"/outils\" class=\"noDeco\">Outils</a>
            <a href=\"/cours\" class=\"noDeco\">Cours</a>
            <a href=\"/actualite\" class=\"noDeco\">Actualité</a>
            ";
        }
        ?>
    </section>

    <footer>
        <a href="/parametres">Param</a>
        <a href="/mentions-légales" class="txt_micro">Mentions légales</a>
    </footer>

</nav>