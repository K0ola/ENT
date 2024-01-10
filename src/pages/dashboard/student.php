<?php session_start()?>

<header>
    <h1 class="txt_h1">BIENVENUE <?= $_SESSION['prenom'] ?> sur votre ENT</h1>
    <!-- <h3>Student</h3> -->
</header>
<section>
    <article class="Widget" id="Agenda">
        <a href="/agenda" class="noDeco Widget_link">
            <h2 class="Widget_Titre">Agenda</h2>
        </a>
    </article>

    <article class="Widget" id="Todoo">
        <a href="/agenda" class="noDeco Widget_link">
            <h2 class="Widget_Titre">A faire</h2>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="#09090B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
    </article>

    <article class="Widget" id="Cours">
        <a href="/cours" class="noDeco Widget_link">
            <h2 class="Widget_Titre">Mes cours</h2>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="#09090B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
    </article>

    <article class="Widget" id="Absences">
        <a href="/vie-scolaire" class="noDeco Widget_link">
            <h2 class="Widget_Titre">Mes absences</h2>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="#09090B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
    </article>
        
    <article class="Widget" id="Notes">

        <a href="/vie-scolaire" class="noDeco Widget_link">
            <h2 class="Widget_Titre">Mes notes</h2>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="#09090B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
    </article>

    <article class="Widget" id="Outils">
        <a href="/outils" class="noDeco Widget_link">
            <h2 class="Widget_Titre">Mes outils</h2>
        </a>
        <div class="outils">
            <a class="outil noDeco" href="https://drive.google.com/drive/my-drive">
                <img src="src/assets/outils/google_drive.svg" alt="">
                <p>Google Drive</p>
            </a>
            <a class="outil noDeco" href="https://www.figma.com/jam">
                <img src="src/assets/outils/figma.svg" alt="">
                <p>Figjam</p>
            </a>
            <a class="outil noDeco" href="https://www.notion.so/fr-fr">
                <img src="src/assets/outils/notion.svg" alt="">
                <p>Notion</p>
            </a>
            <a class="outil noDeco" href="https://elearning.univ-eiffel.fr/">
                <img src="src/assets/outils/Univ_eiffel.svg" alt="">
                <p>E-learning</p>
            </a>
            <a class="outil noDeco" href="https://edt.univ-eiffel.fr/direct/index.jsp?login=visuedt&password=visuedt">
                <img src="src/assets/outils/Calendar-days.svg" alt="">
                <p>Emploi du temps ADE</p>
            </a>
            <a class="outil noDeco" href="https://pix.fr/">
                <img src="src/assets/outils/pix.svg" alt="">
                <p>PIX</p>
            </a>
            <a class="outil noDeco" href="https://www.projet-voltaire.fr/">
                <img src="src/assets/outils/Pencil.svg" alt="">
                <p>Projet Voltaire</p>
            </a>
        </div>
        <!-- <div>
            <h2>Mes raccourcis Drive</h2>
        </div> -->
    </article>

    <article class="Widget frameuniv" id="Actu">

        <a href="/actualite" class="noDeco Widget_link">
            <h2 class="Widget_Titre">Info universitaires</h2>
        </a>
        <div class="news-1">
            <img src="src/assets/image-news/serviette.jpg" alt="">
            <div class="col">
                <h4>Précarité menstruelle : Le Saviez vous ?</h4>
                <p>30% des femmes en France ont été confrontées à la précarité menstruelle... </p>
            </div>
        </div>
        <div class="news-1">
            <img src="src/assets/image-news/Bandeau.png" alt="">
            <div class="col">
                <h4>Conférence : Quelles poursuites d'études après mon Bac+3 ?</h4>
                <p>Vous êtes en 3e année à l'Université et vous vous interrogez...</p>
            </div>
        </div>

        <!-- <div class="Widget" id="Resto">
            <h2>Menu resto universitaire</h2>
        </div> -->
    </article>

</section>