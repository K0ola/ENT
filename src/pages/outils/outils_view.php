<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/pages/outils/outils.css">
    <link rel="stylesheet" href="src/root.css">
    <link rel="stylesheet" href="src/layout/styles/theme.css">
    <title>Outils</title>
</head>
<body>
    <?php require_once('src/layout/nav.php'); ?>
    <h1>Outils</h1>
    <h2>Mes favoris</h2>
    <div class="outils" id="favorisSection">
        
    </div>

    <h2>Mes outils</h2>
    <div class="outils" id="autresSection">
        <div class="outil" id="Drive">
            <a href="https://drive.google.com/drive/my-drive">
                <img src="src/assets/image-news/drive.png" alt="">
                <p>Drive</p>
            </a>
            <button class="favoriButton">Favori</button>
        </div>

        <div class="outil" id="Figjam">
            <a href="https://www.figma.com/jam">
                <img src="src/assets/image-news/figma.png" alt="">
                <p>Figjam</p>
            </a>
            <button class="favoriButton">Favori</button>
        </div>

        <div class="outil" id="Notion">
            <a href="https://www.notion.so/fr-fr">
                <img src="src/assets/image-news/notion.png" alt="">
                <p>Notion</p>
            </a>
            <button class="favoriButton">Favori</button>
        </div>

        <div class="outil" id="E-learning">
            <a href="https://elearning.univ-eiffel.fr/">
                <img src="src/assets/image-news/UGE.png" alt="">
                <p>E-learning</p>
            </a>
            <button class="favoriButton">Favori</button>
        </div>

        <div class="outil" id="ADE" >
            <a href="https://edt.univ-eiffel.fr/direct/index.jsp?login=visuedt&password=visuedt">
                <img src="src/assets/image-news/Calendar.png" alt="">
                <p>ADE</p>
            </a>
            <button class="favoriButton">Favori</button>
        </div>

        <div class="outil" id="PIX">
            <a href="https://pix.fr/">
                <img src="src/assets/image-news/pix.svg" alt="">
                <p>PIX</p>
            </a>
            <button class="favoriButton">Favori</button>
        </div>

        <div class="outil" id="Voltaire">
            <a href="https://www.projet-voltaire.fr/">
                <img src="src/assets/image-news/voltaire.png" alt="">
                <p>Projet Voltaire</p>
            </a>
            <button class="favoriButton">Favori</button>
        </div>

        <div class="outil" id="Esup">
            <a href="https://esup-stage.univ-eiffel.fr/frontend/#/">
                <img src="src/assets/image-news/Mail.png" alt="">
                <p>Esup Stage</p>
            </a>
            <button class="favoriButton">Favori</button>
        </div>

        <div class="outil" id="Eportfolio">
            <a href="https://eportfolio.univ-eiffel.fr/">
                <img src="src/assets/image-news/Eportfolio.png" alt="">
                <p>Eportfolio</p>
            </a>
            <button class="favoriButton">Favori</button>
        </div>
    </div>
    <script>
        // Chargement des favoris depuis le localStorage s'ils existent
        let favoris = JSON.parse(localStorage.getItem('favoris')) || [];

        // Fonction pour mettre à jour les favoris dans le localStorage
        function sauvegarderFavoris() {
            localStorage.setItem('favoris', JSON.stringify(favoris));
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
</body>
</html>