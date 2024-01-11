<?php session_start()?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/root.css">
    <link rel="stylesheet" href="src/layout/styles/theme.css">
    <link rel="stylesheet" href="src/layout/styles/nav.css">
    <link rel="stylesheet" href="src/pages/profil/styles/profil.css">
	<link rel="icon" href="src/assets/outils/Univ_eiffel.svg"/>
    <title>Mon Profil</title>
</head>
<body class="Tropical-Blue">
    
    <script src="src/layout/script/theme.js"></script>
    <?php require_once('src/layout/nav.php'); ?>

    <section class="row">
        <div class="col-12">
        <h1>Mon Profil</h1>
        <p>Prénom : <?= $prenom ?></p>
        <p>Nom : <?= $nom ?></p>
        <p>classe : <?php if($class == 1){
            echo "MMI 1 | TP - A";
        } else if($class == 2){
            echo "MMI 1 | TP - B";
        } else if($class == 3){
            echo "MMI 1 | TP - C";
        } else if($class == 4){
            echo "MMI 1 | TP - D";
        } else if($class == 5){
            echo "MMI 2 | TP - A";
        } else if($class == 6){
            echo "MMI 2 | TP - B";
        } else if($class == 7){
            echo "MMI 2 | TP - C";
        } else if($class == 8){
            echo "MMI 1 | TP - D";
        }?></p>
        <img class="profil_Pic profil_Image" src="<?= $_SESSION["icon_user"] ?>" alt="Profil de <?= htmlspecialchars($_SESSION['login']) ?>">
        </div>
    </section>

    <section class="row">
        <div class="col-12">
            <form action="/upload-pdp" method="post" enctype="multipart/form-data">
                Sélectionnez une image à télécharger :
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Télécharger l'image" name="submit">
            </form>
        </div>
    </section>
    <script src="src/layout/script/burger.js"></script>
</body>
</html>


