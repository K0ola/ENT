<?php session_start()?>

<link rel="stylesheet" href="src/layout/styles/nav.css">
<nav class="txt_nav">
    <header>
        <!-- <a href="/notifications"><img src="" alt="Notifications"></a> -->
        <a href="/profil" class="Nav_profil noDeco"><img class="Icon_Larger" src="src/assets/user/user_icon.png"/><p><?= $_SESSION['prenom'] ?> <?= $_SESSION['nom'] ?></p></a>
        <a href="src/logout.php" class="Nav_logOut">Déconnexion</a>
    </header>
    <hr/>
    <section>
        <?php
        if ($_SESSION['role'] === 'admin') {
            echo "
            <a href=\"/dashboard\" class=\"noDeco Nav_link\"><img class=\"Icon_Large\" src=\"src/assets/icon/Home.svg\" alt=\"\"/>Accueil</a>\n
            <a href=\"/gestion-comptes\" class=\"noDeco Nav_link\"><img class=\"Icon_Large\" src=\"src/assets/icon/Users.svg\" alt=\"\"/>Gestion utilisateurs</a>\n
            <a href=\"/gestion-classes\" class=\"noDeco Nav_link\"><img class=\"Icon_Large\" src=\"src/assets/icon/School.svg\" alt=\"\"/>Gestion classes</a>\n
            <a href=\"/gestion-matieres\" class=\"noDeco Nav_link\"><img class=\"Icon_Large\" src=\"src/assets/icon/Album.svg\" alt=\"\"/>Gestion matières</a>\n
            ";
        } else if ($_SESSION['role'] === 'prof') {
        } else if ($_SESSION['role'] === 'student') {
            echo "
            <a href=\"/dashboard\" class=\"noDeco Nav_link\"><img class=\"Icon_Large\" src=\"src/assets/icon/Home.svg\" alt=\"\"/>Accueil</a>\n
            <a href=\"/agenda\" class=\"noDeco Nav_link\"><img class=\"Icon_Large\" src=\"src/assets/icon/Calendar.svg\" alt=\"\"/>Agenda</a>\n
            <a href=\"/discussion\" class=\"noDeco Nav_link\"><img class=\"Icon_Large\" src=\"src/assets/icon/Messages-square.svg\" alt=\"\"/>Communication</a>\n
            <a href=\"/vie-scolaire\" class=\"noDeco Nav_link\"><img class=\"Icon_Large\" src=\"src/assets/icon/Graduation-cap.svg\" alt=\"\"/>Vie scolaire</a>\n
            <a href=\"/outils\" class=\"noDeco Nav_link\"><img class=\"Icon_Large\" src=\"src/assets/icon/Layout-list.svg\" alt=\"\"/>Outils</a>\n
            <a href=\"/cours\" class=\"noDeco Nav_link\"><img class=\"Icon_Large\" src=\"src/assets/icon/Book-marked.svg\" alt=\"\"/>Cours</a>\n
            <a href=\"/actualité\" class=\"noDeco Nav_link\"><img class=\"Icon_Large\" src=\"src/assets/icon/Megaphone.svg\" alt=\"\"/>Actualité</a>\n
            ";
        }
        ?>
    </section>

    <footer>
        <a href="/parametres" class="NoDeco Nav_link"><img class="Icon_Larger" src="src/assets/icon/Wrench.svg" alt="Paramètres" title="Paramètres"/></a>
        <a href="/mentions-légales" class="txt_micro">Mentions légales</a>
    </footer>

</nav>