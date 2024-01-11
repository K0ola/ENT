<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/root.css">
    <link rel="stylesheet" href="src/layout/styles/theme.css">
    <link rel="stylesheet" href="src/layout/styles/nav.css">
    <link rel="stylesheet" href="src/pages/outils/outils.css">
	<link rel="icon" href="src/assets/outils/Univ_eiffel.svg"/>
    <title>Outils</title>
</head>
<body class="Tropical-Blue">
    
    <script src="src/layout/script/theme.js"></script>
    <?php require_once('src/layout/nav.php'); ?>

    <main>

        <h1 class="txt_h1">Outils</h1>
        <section class="sect">
            <h2 class="txt_h3">Mes favoris</h2>
            <div class="outils" id="favorisSection">
                
            </div>
        </section>

        <section class="sect">
            <h2 class="txt_h3">Mes outils</h2>
            <div class="outils" id="autresSection">
                <div class="outil" id="Drive">
                    <a class=" noDeco" href="https://drive.google.com/drive/my-drive">
                        <img src="src/assets/outils/google_drive.svg" alt="">
                        <p>Google Drive</p>
                    </a>
                    <button class="favoriButton">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" stroke="#09090B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>

                <div class="outil" id="Figjam">
                    <a class="noDeco" href="https://www.figma.com/jam">
                        <img src="src/assets/outils/figma.svg" alt="">
                        <p>Figjam</p>
                    </a>
                    <button class="favoriButton">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" stroke="#09090B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>

                <div class="outil" id="Notion">
                    <a class="noDeco" href="https://www.notion.so/fr-fr">
                        <img src="src/assets/outils/notion.svg" alt="">
                        <p>Notion</p>
                    </a>
                    <button class="favoriButton">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" stroke="#09090B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>

                <div class="outil" id="E-learning">
                    <a class="noDeco" href="https://elearning.univ-eiffel.fr/">
                        <svg class="Icon_2_fill" width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.3575 19.5597C15.2223 18.7788 13.877 18.3567 12.5106 18.3567C10.6818 18.3567 8.95808 19.0321 7.69682 20.2773C7.02415 20.9527 6.49862 21.7336 6.16228 22.6411L6.01514 22.9999H8.9791L9.06318 22.8733C9.21033 22.6411 9.39952 22.409 9.60973 22.219C10.3665 21.4803 11.3965 21.0582 12.5317 21.0582C13.898 21.0582 15.1593 21.7336 15.9371 22.8733L16.0211 22.9788H19.0061L18.8169 22.6411C18.3124 21.3959 17.4506 20.3406 16.3575 19.5597Z" fill="#2D2D80"/>
                            <path d="M4.71171 7.69845C4.03904 7.02308 3.26126 6.49544 2.35736 6.15775L2 6.01001V8.98589L2.12613 9.07031C2.35736 9.21805 2.58859 9.408 2.77778 9.61905C3.51351 10.3789 3.93393 11.413 3.93393 12.5527C3.93393 13.9246 3.26126 15.1909 2.12613 15.9718L2 16.0351V19.0321L2.35736 18.8844C3.5976 18.3778 4.66967 17.5125 5.42643 16.415C6.2042 15.2542 6.62462 13.9246 6.62462 12.5316C6.62462 10.6954 5.95195 8.96478 4.71171 7.69845Z" fill="#2D2D80"/>
                            <path d="M8.66376 5.46131C9.7989 6.24221 11.1442 6.66432 12.5106 6.66432C14.3394 6.66432 16.0632 5.98894 17.3244 4.74372C17.9971 4.06834 18.5226 3.28744 18.859 2.3799L19.0061 2.02111H16.0421L15.9581 2.14774C15.8109 2.3799 15.6217 2.59095 15.4325 2.80201C14.6758 3.5407 13.6247 3.94171 12.5106 3.94171C11.1442 3.94171 9.88298 3.26633 9.1052 2.12663L9.02112 2H6.03613L6.18328 2.3799C6.68778 3.62513 7.54965 4.70151 8.66376 5.46131Z" fill="#2D2D80"/>
                            <path d="M22.8948 9.09142L22.9999 9.00699V6.01001L22.6425 6.15775C21.4023 6.66428 20.3302 7.52961 19.5734 8.6271C18.7957 9.76679 18.3752 11.1175 18.3752 12.5105C18.3752 14.3467 19.0479 16.0773 20.2882 17.3437C20.9608 18.0191 21.7386 18.5467 22.6425 18.8844L22.9999 19.0321V16.0562L22.8737 15.9718C22.6425 15.8241 22.4113 15.6341 22.2221 15.4231C21.4864 14.6633 21.0659 13.6291 21.0659 12.4894C21.087 11.1387 21.7596 9.85122 22.8948 9.09142Z" fill="#2D2D80"/>
                            <path d="M15.1802 12.5317C15.1802 14.0302 13.961 15.2543 12.4685 15.2543C10.976 15.2543 9.77783 14.0302 9.77783 12.5317C9.77783 11.0332 10.9971 9.80908 12.4895 9.80908C13.961 9.83019 15.1802 11.0332 15.1802 12.5317Z" fill="#2D2D80"/>
                        </svg>
                        <p>E-learning</p>
                    </a>
                    <button class="favoriButton">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" stroke="#09090B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>

                <div class="outil" id="ADE" >
                    <a class="noDeco" href="https://edt.univ-eiffel.fr/direct/index.jsp?login=visuedt&password=visuedt">
                        <svg class="Icon_2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 2V6M8 2V6M3 10H21M8 14H8.01M12 14H12.01M16 14H16.01M8 18H8.01M12 18H12.01M16 18H16.01M5 4H19C20.1046 4 21 4.89543 21 6V20C21 21.1046 20.1046 22 19 22H5C3.89543 22 3 21.1046 3 20V6C3 4.89543 3.89543 4 5 4Z" stroke="#2D2D80" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <p>Emploi du temps ADE</p>
                    </a>
                    <button class="favoriButton">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" stroke="#09090B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>

                <div class="outil" id="PIX">
                    <a class="noDeco" href="https://pix.fr/">
                        <img src="src/assets/outils/pix.svg" alt="">
                        <p>PIX</p>
                    </a>
                    <button class="favoriButton">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" stroke="#09090B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>

                <div class="outil" id="Voltaire">
                    <a class="noDeco" href="https://www.projet-voltaire.fr/">
                        <svg class="Icon_2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 5L19 9M17 3.00003C17.2547 2.69906 17.5697 2.45408 17.925 2.28071C18.2803 2.10733 18.6681 2.00936 19.0636 1.99304C19.4592 1.97672 19.8538 2.04241 20.2224 2.18591C20.5909 2.32942 20.9254 2.5476 21.2043 2.82655C21.4833 3.10549 21.7006 3.43909 21.8425 3.80607C21.9845 4.17305 22.0478 4.56536 22.0286 4.95801C22.0094 5.35065 21.908 5.73501 21.7309 6.08659C21.5538 6.43817 21.3049 6.74926 21 7.00003L7.5 20.5L2 22L3.5 16.5L17 3.00003Z" stroke="#2D2D80" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <p>Projet Voltaire</p>
                    </a>
                    <button class="favoriButton">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" stroke="#09090B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>

                <div class="outil" id="Esup">
                    <a class="noDeco" href="https://esup-stage.univ-eiffel.fr/frontend/#/">
                        <svg class="Icon_2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M4 22H20C20.5304 22 21.0391 21.7893 21.4142 21.4142C21.7893 21.0391 22 20.5304 22 20V4C22 3.46957 21.7893 2.96086 21.4142 2.58579C21.0391 2.21071 20.5304 2 20 2H8C7.46957 2 6.96086 2.21071 6.58579 2.58579C6.21071 2.96086 6 3.46957 6 4V20C6 20.5304 5.78929 21.0391 5.41421 21.4142C5.03914 21.7893 4.53043 22 4 22ZM4 22C3.46957 22 2.96086 21.7893 2.58579 21.4142C2.21071 21.0391 2 20.5304 2 20V11C2 9.9 2.9 9 4 9H6M18 14H10M15 18H10M10 6H18V10H10V6Z" stroke="#09090B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <p>Esup Stage</p>
                    </a>
                    <button class="favoriButton">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" stroke="#09090B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>

                <div class="outil" id="Eportfolio">
                    <a class="noDeco" href="https://eportfolio.univ-eiffel.fr/">
                    <svg class="Icon_2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M8 21H16M12 17V21M4 3H20C21.1046 3 22 3.89543 22 5V15C22 16.1046 21.1046 17 20 17H4C2.89543 17 2 16.1046 2 15V5C2 3.89543 2.89543 3 4 3Z" stroke="#09090B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                        <p>Eportfolio</p>
                    </a>
                    <button class="favoriButton">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" stroke="#09090B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </div>
        </section>
    </main>
    <script>
        // Chargement des favoris depuis le localStorage s'ils existent
        let favoris = JSON.parse(localStorage.getItem('ENT_favoris')) || [];

        // Fonction pour mettre à jour les favoris dans le localStorage
        function sauvegarderFavoris() {
            localStorage.setItem('ENT_favoris', JSON.stringify(favoris));
        }

        // Récupérer tous les boutons de favori
        const favoriButtons = document.querySelectorAll('.favoriButton');

        // Associer un gestionnaire d'événements à chaque bouton
        favoriButtons.forEach(button => {
            button.addEventListener('click', function() {
                const applicationId = button.parentElement.id;

                // Vérifier si l'application est déjà un favori
                const isFavori = favoris.includes(applicationId);

                // Inverser l'état du favori
                if (isFavori) {
                    favoris = favoris.filter(id => id !== applicationId);
                    button.classList.remove('favori');
                    // Déplacer l'élément depuis la section des favoris vers la section "Mes outils"
                    const outil = document.getElementById(applicationId);
                    const autresSection = document.getElementById('autresSection');
                    if (outil && autresSection) {
                        autresSection.appendChild(outil);
                    }
                } else {
                    favoris.push(applicationId);
                    button.classList.add('favori');
                    // Déplacer l'élément depuis la section "Mes outils" vers la section des favoris
                    const outil = document.getElementById(applicationId);
                    const favorisSection = document.getElementById('favorisSection');
                    if (outil && favorisSection) {
                        favorisSection.appendChild(outil);
                    }
                }

                // Mettre à jour et sauvegarder les favoris dans le localStorage après chaque modification
                sauvegarderFavoris();
            });
        });

        // Déplacer les applications dans les sections appropriées au chargement de la page
        const favorisSection = document.getElementById('favorisSection');
        const autresSection = document.getElementById('autresSection');
        const outils = document.querySelectorAll('.outil');

        outils.forEach(outil => {
            const isFavori = favoris.includes(outil.id);
            if (isFavori) {
                if (favorisSection) {
                    favorisSection.appendChild(outil);
                }
                if (outil.classList.contains('favori')) {
                    outil.classList.add('favori');
                }
            } else {
                if (autresSection) {
                    autresSection.appendChild(outil);
                }
            }
        });
    </script>
    <?php require_once 'src/layout/discussion.php'; ?>
    <script src="src/layout/script/burger.js"></script>
</body>
</html>
