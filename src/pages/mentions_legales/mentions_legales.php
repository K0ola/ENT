<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/root.css">
    <link rel="stylesheet" href="src/layout/styles/theme.css">
    <link rel="stylesheet" href="src/layout/styles/nav.css">
	<link rel="icon" href="src/assets/outils/Univ_eiffel.svg"/>
    <title>Mentions légales</title>

    <style>
        main {
            display: grid;
            padding: var(--Padding-XL);
            gap: var(--Gap-XL);
        }

        h2 {
            color: var(--Sous-Titre);
        }

        section {
            display: grid;
            gap: var(--Gap-M);
        }

    </style>
</head>
<body class="Tropical-Blue">
    
    <script src="src/layout/script/theme.js"></script>
    <?php require_once('src/layout/nav.php'); ?>
    <main>
        <h1 class="txt_h1">Mentions légales du site</h1>

        <section>
            <h2 class="txt_h3">1. Présentation du Site</h2>
            <p>
                Nom du site : ENT MMI - Champs sur Marne<br>
                URL du site : <a href="https://ent-mmi.site">https://ent-mmi.site</a><br>
                Propriétaires : Thomas Bansront, Robin Vigier, Arthur Zachary, Pauline Gazengel<br>
                <br>
                Rôle sur le projet (SAE 3.01):<br>
                - Robin Vigier (Chef de projet, responsable front et Design maquette)<br>
                - Arthur Zachary (Responsable back et Design maquette)<br>
                - Pauline Gazengel (Développement et Design maquette)<br>
                - Thomas Bansront (Développement, rédaction et Design maquette)<br>
                <br>
                Adresse de contact chef de projet: <a href="mailto:robin.vigier.pro@gmail.com">robin.vigier.pro@gmail.com</a><br>
                <br>
                Adresse de l'IUT : 2 Rue Albert Einstein F, 77420 Champs-sur-Marne<br>
                Téléphone de l'IUT : 01 60 95 85 85<br>
            </p>
        </section>

        <section>
            <h2 class="txt_h3">2. Hébergement</h2>

            <p>
                Nom de l'hébergeur : Hostinger<br>
                Toutes les données personnelles sont traitées conformément au Règlement général sur la protection des données (UE) 2016/679 (« RGPD »).<br>
                <br>
                Pour toute question concernant la présente Politique ou toute demande concernant le traitement des données personnelles, veuillez nous contacter à l’adresse suivante : <a href="mailto:gdpr@hostinger.com">gdpr@hostinger.com</a>.<br>
            </p>
        </section>

        <section>
            <h2 class="txt_h3">3. Protection des données (RGPD)</h2>

            <p>
                Conformément au Règlement général sur la protection des données (RGPD), chaque utilisateur dispose d'un droit d'accès, de rectification, de suppression et de portabilité des données le concernant. Ces droits peuvent être exercés en contactant le responsable du site à l'adresse e-mail indiquée ci-dessus.<br>
                <br>
                Article 15 du RGPD : Droit d'accès aux données personnelles.<br>
                Article 16 du RGPD : Droit de rectification des données inexactes.<br>
            </p>
        </section>

        <section>
            <h2 class="txt_h3">4. Propriété intellectuelle</h2>
            <p>
                Les contenus de ce site (textes, images, design, base de données, code) sont protégés par le droit d'auteur et sont la propriété exclusive de leurs auteurs respectifs.<br>
                L'illustration de la page de connexion est libre de droit et provient du site internet <a href="https://unsplash.com/fr/photos/homme-regardant-le-ciel-blanc-pris-de-jour-pvHma684eEI">Unsplash</a>.
            </p>
        </section>
        <section>
            <h2 class="txt_h3">5. Responsabilité</h2>
            <p>
                Les propriétaires du site ne sauraient être tenus responsables des erreurs éventuelles présentes sur le site, ni de l’utilisation et de l’interprétation des informations qu’il contient.<br>
            </p>
        </section>
    </main>
    <script src="src/layout/script/burger.js"></script>
</body>
</html>