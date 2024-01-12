<?php
// Démarrer la session pour accéder aux variables de session
session_start();

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['id_utilisateur'])) {
    // Récupérer l'identifiant de l'utilisateur depuis la session
    $id_utilisateur_connecte = $_SESSION['id_utilisateur'];


try {
    $conn = new PDO('mysql:host=127.0.0.1;dbname=u972668351_ent;port=3306;charset=utf8', 'u972668351_root', '7?O|p6T!n');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer les notes de l'utilisateur connecté depuis la base de données
        $sql = "SELECT n.id_notes, c.nom_cours, n.note
                FROM notes n
                INNER JOIN cours c ON n.id_cours = c.id_cours
                WHERE n.id_utilisateur = :id_utilisateur";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_utilisateur', $id_utilisateur_connecte);
        $stmt->execute();

        $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
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
    <title>Vie Scolaire</title>
</head>
<body class="Tropical-Blue">
    
    <script src="src/layout/script/theme.js"></script>
    <?php require_once('src/layout/nav.php'); ?>
    <?php if (isset($notes) && count($notes) > 0) : ?>
    <h1>Vie Scolaire</h1>
    <table>
            <thead>
                <tr>
                    <th>Cours</th>
                    <th>Note</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($notes as $note) : ?>
                    <tr>
                        <td><?php echo $note['nom_cours']; ?></td>
                        <td><?php echo $note['note']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>Aucune note disponible.</p>
    <?php endif; ?>
    
    
    <?php require_once 'src/layout/discussion.php'; ?>
    <script src="src/layout/script/burger.js"></script>
</body>
</html>