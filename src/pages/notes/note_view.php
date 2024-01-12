<?php
// Démarrer la session pour accéder aux variables de session
session_start();

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['id_utilisateur']) && $_SESSION['role'] === 'prof') {
    // Récupérer l'identifiant de l'utilisateur depuis la session
    $id_professeur_connecte = $_SESSION['id_utilisateur'];

    try {
        $conn = new PDO('mysql:host=127.0.0.1;dbname=u972668351_ent;port=3306;charset=utf8', 'u972668351_root', '7?O|p6T!n');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupérer la liste des cours
        $sql_cours = "SELECT id_cours, nom_cours FROM cours";
        $stmt_cours = $conn->query($sql_cours);
        $cours = $stmt_cours->fetchAll(PDO::FETCH_ASSOC);

        // Si le formulaire est soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Boucle à travers les données du formulaire
            foreach ($_POST['notes'] as $id_eleve => $notes_cours) {
                // Boucle à travers les notes pour chaque cours
                foreach ($notes_cours as $id_cours => $note) {
                    // Insérer la note dans la base de données
                    $sql_insert = "INSERT INTO notes (id_utilisateur, id_cours, note)
                                VALUES (:id_utilisateur, :id_cours, :note)";

                    $stmt_insert = $conn->prepare($sql_insert);
                    $stmt_insert->bindParam(':id_utilisateur', $id_eleve);
                    $stmt_insert->bindParam(':id_cours', $id_cours);
                    $stmt_insert->bindParam(':note', $note);
                    $stmt_insert->execute();
                }
            }
        }
    } catch(PDOException $e) {
        echo "Vous ne pouvez pas rentrer les notes pour ce cours. Elles sont déjà rentrées.";
    }
} else {
    // Rediriger vers la page d'accueil ou une page d'erreur
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/pages/vie-scolaire/vie-scolaire.css">
    <link rel="stylesheet" href="src/root.css">
    <link rel="stylesheet" href="src/layout/styles/nav.css">
    <link rel="stylesheet" href="src/layout/styles/theme.css">
	<link rel="icon" href="src/assets/outils/Univ_eiffel.svg"/>
    <title>Gestion des Notes</title>
</head>
<body class="Tropical-Blue">
    
    <script src="src/layout/script/theme.js"></script>
    <?php require_once('src/layout/nav.php'); ?>

    <h1>Gestion des Notes</h1>
    <form method="post" action="">
    <table>
        <thead>
            <tr>
                <th>Élève</th>
                <?php foreach ($cours as $cours_item) : ?>
                    <th><?php echo $cours_item['nom_cours']; ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php
            // Récupérer la liste des élèves
            $sql_eleves = "SELECT id_utilisateur, nom_utilisateur FROM utilisateurs WHERE role_utilisateur = 'student'";
            $stmt_eleves = $conn->query($sql_eleves);
            $eleves = $stmt_eleves->fetchAll(PDO::FETCH_ASSOC);

            foreach ($eleves as $eleve) :
            ?>
                <tr>
                    <td><?php echo $eleve['nom_utilisateur']; ?></td>
                    <?php foreach ($cours as $cours_item) : ?>
                        <td>
                            <input type="text" name="notes[<?php echo $eleve['id_utilisateur']; ?>][<?php echo $cours_item['id_cours']; ?>]" value="">
                        </td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <button type="submit">Enregistrer les notes</button>
</form>
    <?php require_once 'src/layout/discussion.php'; ?>
    <script src="src/layout/script/burger.js"></script>
</body>
</html>
