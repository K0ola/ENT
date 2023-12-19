<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/styles/themes.css">
    <link rel="stylesheet" href="./src/styles/root.css">
    <title>Intranet Gustave Eiffel</title>
</head>


<body>
    <?php

    if(isset($_SESSION["login"])){
        if($_SESSION["login"]=="admin"){
            require('src/pages/panel_admin.php');
        }
        else{
            require('src/pages/panel_etudiant.php');
        }
    }
    else{
        require('src/pages/connexion.php');
    }

    ?>



    <!-- <div id="themeOptions">
        <button onclick="setTheme('blue')">Bleu</button>
        <button onclick="setTheme('green')">Vert</button>
        <button onclick="setTheme('red')">Rouge</button>
        <button onclick="setTheme('purple')">Violet</button>
    </div>
    
    <h1 id="title">Thème Changer</h1>

    <script src="./src/scripts/themes.js"></script> -->
</body>
</html>