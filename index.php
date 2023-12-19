<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/styles/themes.css">
    <link rel="stylesheet" href="./src/styles/index.css">
    <link rel="stylesheet" href="./src/styles/root.css">
    <title>Document</title>
</head>

<?php
    include('./src/scripts/connexion_bdd.php');
    $requete="SELECT * FROM utilisateurs";
    $stmt=$db->query($requete);
    $result=$stmt->fetchall(PDO::FETCH_ASSOC);
    
?>
<body>
    <?php
    if (isset($_SESSION["login"])){
        require("./src/pages/panel.php");
    } else {
        include ('./src/pages/connexion.php');  
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