<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/pages/cours/cours.css">
    <link rel="stylesheet" href="src/root.css">
    <link rel="stylesheet" href="src/layout/styles/nav.css">
    <link rel="stylesheet" href="src/layout/styles/theme.css">
	<link rel="icon" href="src/assets/outils/Univ_eiffel.svg"/>
    <title>Cours</title>
</head>
<body class="Tropical-Blue">
    
    <script src="src/layout/script/theme.js"></script>
    <?php require_once('src/layout/nav.php'); ?>

    <h1>Cours</h1>

    <?php if ($_SESSION['role'] === 'prof') : ?>
        <h2>Ajouter un Cours</h2>
        <form method="post" action="" enctype="multipart/form-data">
            <label for="nom_cours">Nom du Cours:</label>
            <input type="text" id="nom_cours" name="nom_cours" required>

            <label for="fichier_cours">Fichier du Cours (PDF):</label>
            <input type="file" id="fichier_cours" name="fichier_cours" accept=".pdf" required>

            <button type="submit">Ajouter Cours</button>
        </form>
    <?php endif; ?>

    <ul>
        <?php
        // Récupérer la liste des cours depuis la base de données
        $sql_cours = "SELECT id_cours, nom_cours, prof_cours, fichier_cours FROM cours";
        $stmt_cours = $conn->query($sql_cours);
        $cours = $stmt_cours->fetchAll(PDO::FETCH_ASSOC);

        // Afficher les cours
        foreach ($cours as $cours_item) :
        ?>
            <li>
                <?php echo $cours_item['nom_cours']; ?> (Professeur : <?php echo $cours_item['prof_cours']; ?>)
                
                <?php if ($_SESSION['role'] === 'student') : ?>
                    <a href="src/cours/<?php echo $cours_item['nom_cours']; ?>/<?php echo $cours_item['fichier_cours']; ?>" download>
                        Télécharger le cours (PDF)
                    </a>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php require_once 'src/layout/discussion.php'; ?>
    <script src="src/layout/script/burger.js"></script>
</body>
</html>


<?php
session_start();
require_once('src/model.php');
$userModel = new UserModel();

if (!isset($_SESSION['login'])) {
    header('Location: index.php?p=connexion');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assurez-vous que les données du formulaire sont présentes
    if (isset($_POST['nom_cours'], $_FILES['fichier_cours'])) {
        $nom_cours = $_POST['nom_cours'];
        $prof_cours = $_SESSION['nom']; // Assurez-vous que $_SESSION['nom'] existe

        // Gestion du fichier
        $fichier_cours = $_FILES['fichier_cours'];
        $destination = 'src/cours/' . $nom_cours . '/';

        // Vérifiez si le répertoire de destination existe
        if (!is_dir($destination)) {
            mkdir($destination, 0777, true);
        }

        // Déplacez le fichier vers le répertoire de destination
        $destination .= $fichier_cours['name'];
        move_uploaded_file($fichier_cours['tmp_name'], $destination);

        // Maintenant, vous pouvez insérer les données dans la base de données
        // Assurez-vous de configurer votre modèle de base de données pour cela
        // ...

        // Redirection vers la page des cours après l'ajout
        header("Location: /cours");
        exit();
    } else {
        echo "Tous les champs du formulaire ne sont pas présents.";
    }
}
?>
