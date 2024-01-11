<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/root.css">
    <link rel="stylesheet" href="src/layout/styles/theme.css">
    <link rel="stylesheet" href="src/layout/styles/nav.css">
    <link rel="stylesheet" href="src/pages/profil/styles/parametre.css">
	<link rel="icon" href="src/assets/outils/Univ_eiffel.svg"/>
    <title>Mes Paramètres</title>
</head>
<body class="Tropical-Blue">
    
    <script src="src/layout/script/theme.js"></script>
    <?php require_once('src/layout/nav.php'); ?>

    <a href="/profil">profil</a>
    <a href="/parametre">Paramètres</a>

    <main>

        <h1>Paramètres</h1>

        <h2>Thèmes</h2>

        <form action="index.html" method="post" id="themeChoises">

            <label class="container Tropical-Blue">
                <input type="checkbox" class="themeBox" id="Tropical-Blue">
                <span class="checkmark"></span>
                Tropical-Blue
            </label>

            <label class="container Pippin">
                <input type="checkbox" class="themeBox" id="Pippin">
                <span class="checkmark"></span>
                Pippin
            </label>

            <label class="container Beryl-Green">
                <input type="checkbox" class="themeBox" id="Beryl-Green">
                <span class="checkmark"></span>
                Beryl-Green
            </label>

            <label class="container Amour">
                <input type="checkbox" class="themeBox" id="Amour">
                <span class="checkmark"></span>
                Amour
            </label>

            <label class="container Silver-Rust">
                <input type="checkbox" class="themeBox" id="Silver-Rust">
                <span class="checkmark"></span>
                Silver-Rust
            </label>

            <label class="container Lucky-Point">
                <input type="checkbox" class="themeBox" id="Lucky-Point">
                <span class="checkmark"></span>
                Lucky-Point
            </label>

            <label class="container Derby">
                <input type="checkbox" class="themeBox" id="Derby">
                <span class="checkmark"></span>
                Derby
            </label>

        </form>

                
    </main>
    
    <script src="src/layout/script/checktheme.js"></script>
    <script src="src/layout/script/burger.js"></script>
</body>
</html>