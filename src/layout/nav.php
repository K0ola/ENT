<?php session_start()?>

<nav class="txt_nav">
    <img class="Icon_Big BurgerIcon" src="src/assets/icon/Menu.svg" alt="Menu"/>
    <div class="Nav_Menu">
        <header>
            <!-- <a href="/notifications"><img src="" alt="Notifications"></a> -->
            <a href="/profil" class="Nav_profil noDeco"><img class="Icon_Larger profil_Pic" src="<?= $_SESSION["icon_user"] ?>"/><p><?= $_SESSION['prenom'] ?></p></a>
            <a href="src/logout.php" class="Nav_logOut">Déconnexion</a>
        </header>
        <hr/>
        <section>
            <?php
            if ($_SESSION['role'] === 'admin') {
                echo "
                <a href=\"/dashboard\" class=\"noDeco Nav_link\">
                    <svg class=\"Icon_Large Icon path\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                        <path d=\"M9 22V12H15V22M3 9L12 2L21 9V20C21 20.5304 20.7893 21.0391 20.4142 21.4142C20.0391 21.7893 19.5304 22 19 22H5C4.46957 22 3.96086 21.7893 3.58579 21.4142C3.21071 21.0391 3 20.5304 3 20V9Z\" stroke=\"#09090Bv\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
                    </svg>
                Accueil</a>\n
                <a href=\"/gestion-comptes\" class=\"noDeco Nav_link\">
                    <svg class=\"Icon_Large Icon path\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                        <path d=\"M16 21V19C16 17.9391 15.5786 16.9217 14.8284 16.1716C14.0783 15.4214 13.0609 15 12 15H6C4.93913 15 3.92172 15.4214 3.17157 16.1716C2.42143 16.9217 2 17.9391 2 19V21M22 21V19C21.9993 18.1137 21.7044 17.2528 21.1614 16.5523C20.6184 15.8519 19.8581 15.3516 19 15.13M16 3.13C16.8604 3.35031 17.623 3.85071 18.1676 4.55232C18.7122 5.25392 19.0078 6.11683 19.0078 7.005C19.0078 7.89318 18.7122 8.75608 18.1676 9.45769C17.623 10.1593 16.8604 10.6597 16 10.88M13 7C13 9.20914 11.2091 11 9 11C6.79086 11 5 9.20914 5 7C5 4.79086 6.79086 3 9 3C11.2091 3 13 4.79086 13 7Z\" stroke=\"#09090B\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
                    </svg>
                Gestion utilisateurs</a>\n
                <a href=\"/gestion-classes\" class=\"noDeco Nav_link\">
                <svg class=\"Icon_Large Icon path\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                    <path d=\"M4 6L12 2L20 6M18 10L22 12V20C22 20.5304 21.7893 21.0391 21.4142 21.4142C21.0391 21.7893 20.5304 22 20 22H4C3.46957 22 2.96086 21.7893 2.58579 21.4142C2.21071 21.0391 2 20.5304 2 20V12L6 10M14 22V18C14 17.4696 13.7893 16.9609 13.4142 16.5858C13.0391 16.2107 12.5304 16 12 16C11.4696 16 10.9609 16.2107 10.5858 16.5858C10.2107 16.9609 10 17.4696 10 18V22M18 5V22M6 5V22M14 9C14 10.1046 13.1046 11 12 11C10.8954 11 10 10.1046 10 9C10 7.89543 10.8954 7 12 7C13.1046 7 14 7.89543 14 9Z\" stroke=\"#09090B\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
                </svg>
                Gestion classes</a>\n
                <a href=\"/gestion-matieres\" class=\"noDeco Nav_link\">
                    <svg class=\"Icon_Large Icon path\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                        <path d=\"M11 3V11L14 8L17 11V3M5 3H19C20.1046 3 21 3.89543 21 5V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V5C3 3.89543 3.89543 3 5 3Z\" stroke=\"#09090B\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
                    </svg>
            
                Gestion matières</a>\n
                ";
            } else if ($_SESSION['role'] === 'prof') {
                echo "
                <a href=\"/dashboard\" class=\"noDeco Nav_link\"><svg class=\"Icon_Large Icon path\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                <path d=\"M9 22V12H15V22M3 9L12 2L21 9V20C21 20.5304 20.7893 21.0391 20.4142 21.4142C20.0391 21.7893 19.5304 22 19 22H5C4.46957 22 3.96086 21.7893 3.58579 21.4142C3.21071 21.0391 3 20.5304 3 20V9Z\" stroke=\"#09090Bv\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
            </svg>Accueil</a>\n
                <a href=\"/agenda\" class=\"noDeco Nav_link\"><svg class=\"Icon_Large Icon path\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                <path d=\"M16 2V6M8 2V6M3 10H21M5 4H19C20.1046 4 21 4.89543 21 6V20C21 21.1046 20.1046 22 19 22H5C3.89543 22 3 21.1046 3 20V6C3 4.89543 3.89543 4 5 4Z\" stroke=\"#09090B\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
            </svg>Agenda</a>\n
                <a href=\"/discussion\" class=\"noDeco Nav_link\"><svg class=\"Icon_Large Icon path\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                <path d=\"M18 9H20C20.5304 9 21.0391 9.21071 21.4142 9.58579C21.7893 9.96086 22 10.4696 22 11V22L18 18H12C11.4696 18 10.9609 17.7893 10.5858 17.4142C10.2107 17.0391 10 16.5304 10 16V15M14 9C14 9.53043 13.7893 10.0391 13.4142 10.4142C13.0391 10.7893 12.5304 11 12 11H6L2 15V4C2 2.9 2.9 2 4 2H12C12.5304 2 13.0391 2.21071 13.4142 2.58579C13.7893 2.96086 14 3.46957 14 4V9Z\" stroke=\"#09090B\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
            </svg>Communication</a>\n
                <a href=\"/notes\" class=\"noDeco Nav_link\"><svg class=\"Icon_Large Icon path\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                <path d=\"M22 10V16M22 10L12 5L2 10L12 15L22 10ZM6 12V17C9 20 15 20 18 17V12\" stroke=\"#09090B\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
            </svg>Notes</a>\n
                <a href=\"/outils\" class=\"noDeco Nav_link\"><svg class=\"Icon_Large Icon path\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                <path d=\"M14 4H21M14 9H21M14 15H21M14 20H21M4 3H9C9.55228 3 10 3.44772 10 4V9C10 9.55228 9.55228 10 9 10H4C3.44772 10 3 9.55228 3 9V4C3 3.44772 3.44772 3 4 3ZM4 14H9C9.55228 14 10 14.4477 10 15V20C10 20.5523 9.55228 21 9 21H4C3.44772 21 3 20.5523 3 20V15C3 14.4477 3.44772 14 4 14Z\" stroke=\"#09090B\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
            </svg>Outils</a>\n
                <a href=\"/cours\" class=\"noDeco Nav_link\"><svg class=\"Icon_Large Icon path\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                <path d=\"M4 19.5V4.5C4 3.83696 4.26339 3.20107 4.73223 2.73223C5.20107 2.26339 5.83696 2 6.5 2H20V22H6.5C5.83696 22 5.20107 21.7366 4.73223 21.2678C4.26339 20.7989 4 20.163 4 19.5ZM4 19.5C4 18.837 4.26339 18.2011 4.73223 17.7322C5.20107 17.2634 5.83696 17 6.5 17H20M10 2V10L13 7L16 10V2\" stroke=\"#09090B\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
            </svg>Cours</a>\n
                <a href=\"/devoirs\" class=\"noDeco Nav_link\"><svg class=\"Icon_Large Icon path\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                <path d=\"M4 19.5V4.5C4 3.83696 4.26339 3.20107 4.73223 2.73223C5.20107 2.26339 5.83696 2 6.5 2H20V22H6.5C5.83696 22 5.20107 21.7366 4.73223 21.2678C4.26339 20.7989 4 20.163 4 19.5ZM4 19.5C4 18.837 4.26339 18.2011 4.73223 17.7322C5.20107 17.2634 5.83696 17 6.5 17H20M10 2V10L13 7L16 10V2\" stroke=\"#09090B\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
            </svg>Devoirs</a>\n
                <a href=\"/actualite\" class=\"noDeco Nav_link\"><svg  class=\"Icon_Large Icon path\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                <path d=\"M11.6002 16.8C11.4952 17.1808 11.3161 17.5372 11.0733 17.8488C10.8305 18.1605 10.5287 18.4212 10.1851 18.6162C9.84156 18.8112 9.46294 18.9367 9.0709 18.9853C8.67885 19.034 8.28105 19.005 7.90022 18.9C7.51938 18.7949 7.16297 18.6159 6.85133 18.3731C6.53969 18.1303 6.27892 17.8285 6.08392 17.4849C5.88892 17.1413 5.7635 16.7627 5.71482 16.3706C5.66614 15.9786 5.69516 15.5808 5.80022 15.2M3 11L21 6V18L3 14V11Z\" stroke=\"#09090B\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
            </svg>Actualité</a>\n
                ";
            } else if ($_SESSION['role'] === 'student') {
                echo "
                <a href=\"/dashboard\" class=\"noDeco Nav_link\">
                    <svg class=\"Icon_Large Icon path\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                        <path d=\"M9 22V12H15V22M3 9L12 2L21 9V20C21 20.5304 20.7893 21.0391 20.4142 21.4142C20.0391 21.7893 19.5304 22 19 22H5C4.46957 22 3.96086 21.7893 3.58579 21.4142C3.21071 21.0391 3 20.5304 3 20V9Z\" stroke=\"#09090Bv\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
                    </svg>
                Accueil</a>\n
                <a href=\"/agenda\" class=\"noDeco Nav_link\">
                    <svg class=\"Icon_Large Icon path\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                        <path d=\"M16 2V6M8 2V6M3 10H21M5 4H19C20.1046 4 21 4.89543 21 6V20C21 21.1046 20.1046 22 19 22H5C3.89543 22 3 21.1046 3 20V6C3 4.89543 3.89543 4 5 4Z\" stroke=\"#09090B\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
                    </svg>
                Agenda</a>\n
                <a href=\"/discussion\" class=\"noDeco Nav_link\">
                    <svg class=\"Icon_Large Icon path\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                        <path d=\"M18 9H20C20.5304 9 21.0391 9.21071 21.4142 9.58579C21.7893 9.96086 22 10.4696 22 11V22L18 18H12C11.4696 18 10.9609 17.7893 10.5858 17.4142C10.2107 17.0391 10 16.5304 10 16V15M14 9C14 9.53043 13.7893 10.0391 13.4142 10.4142C13.0391 10.7893 12.5304 11 12 11H6L2 15V4C2 2.9 2.9 2 4 2H12C12.5304 2 13.0391 2.21071 13.4142 2.58579C13.7893 2.96086 14 3.46957 14 4V9Z\" stroke=\"#09090B\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
                    </svg>
                Communication</a>\n
                <a href=\"/vie-scolaire\" class=\"noDeco Nav_link\">
                    <svg class=\"Icon_Large Icon path\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                        <path d=\"M22 10V16M22 10L12 5L2 10L12 15L22 10ZM6 12V17C9 20 15 20 18 17V12\" stroke=\"#09090B\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
                    </svg>
                Vie scolaire</a>\n
                <a href=\"/outils\" class=\"noDeco Nav_link\">
                    <svg class=\"Icon_Large Icon path\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                        <path d=\"M14 4H21M14 9H21M14 15H21M14 20H21M4 3H9C9.55228 3 10 3.44772 10 4V9C10 9.55228 9.55228 10 9 10H4C3.44772 10 3 9.55228 3 9V4C3 3.44772 3.44772 3 4 3ZM4 14H9C9.55228 14 10 14.4477 10 15V20C10 20.5523 9.55228 21 9 21H4C3.44772 21 3 20.5523 3 20V15C3 14.4477 3.44772 14 4 14Z\" stroke=\"#09090B\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
                    </svg>
                Outils</a>\n
                <a href=\"/cours\" class=\"noDeco Nav_link\">
                    <svg class=\"Icon_Large Icon path\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                        <path d=\"M4 19.5V4.5C4 3.83696 4.26339 3.20107 4.73223 2.73223C5.20107 2.26339 5.83696 2 6.5 2H20V22H6.5C5.83696 22 5.20107 21.7366 4.73223 21.2678C4.26339 20.7989 4 20.163 4 19.5ZM4 19.5C4 18.837 4.26339 18.2011 4.73223 17.7322C5.20107 17.2634 5.83696 17 6.5 17H20M10 2V10L13 7L16 10V2\" stroke=\"#09090B\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
                    </svg>
                Cours</a>\n
                <a href=\"/actualite\" class=\"noDeco Nav_link\">
                    <svg  class=\"Icon_Large Icon path\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                        <path d=\"M11.6002 16.8C11.4952 17.1808 11.3161 17.5372 11.0733 17.8488C10.8305 18.1605 10.5287 18.4212 10.1851 18.6162C9.84156 18.8112 9.46294 18.9367 9.0709 18.9853C8.67885 19.034 8.28105 19.005 7.90022 18.9C7.51938 18.7949 7.16297 18.6159 6.85133 18.3731C6.53969 18.1303 6.27892 17.8285 6.08392 17.4849C5.88892 17.1413 5.7635 16.7627 5.71482 16.3706C5.66614 15.9786 5.69516 15.5808 5.80022 15.2M3 11L21 6V18L3 14V11Z\" stroke=\"#09090B\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
                    </svg>
                Actualité</a>\n
                ";
            }
            ?>
        </section>

        <footer>
            <a href="/parametre" class="NoDeco Nav_link">
                <svg class="Icon_Large Icon path" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.6999 6.29998C14.5166 6.48691 14.414 6.73823 14.414 6.99998C14.414 7.26173 14.5166 7.51305 14.6999 7.69998L16.2999 9.29998C16.4868 9.48321 16.7381 9.58584 16.9999 9.58584C17.2616 9.58584 17.5129 9.48321 17.6999 9.29998L21.4699 5.52998C21.9727 6.64117 22.1249 7.87921 21.9063 9.07913C21.6877 10.279 21.1086 11.3838 20.2461 12.2463C19.3837 13.1087 18.2789 13.6878 17.079 13.9064C15.8791 14.1251 14.641 13.9728 13.5299 13.47L6.61986 20.38C6.22203 20.7778 5.68246 21.0013 5.11986 21.0013C4.55725 21.0013 4.01768 20.7778 3.61986 20.38C3.22203 19.9822 2.99854 19.4426 2.99854 18.88C2.99854 18.3174 3.22203 17.7778 3.61986 17.38L10.5299 10.47C10.027 9.35879 9.87477 8.12075 10.0934 6.92083C10.312 5.72092 10.8911 4.61614 11.7536 3.7537C12.616 2.89127 13.7208 2.31215 14.9207 2.09352C16.1206 1.8749 17.3587 2.02714 18.4699 2.52998L14.7099 6.28998L14.6999 6.29998Z" stroke="#09090B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
            <a href="/mentions-legales" class="txt_micro">Mentions légales</a>
        </footer>
    </div>
</nav>
