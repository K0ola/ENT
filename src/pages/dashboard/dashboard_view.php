<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord</title>
    <link rel="stylesheet" href="src/root.css">
    <link rel="stylesheet" href="src/pages/dashboard/styles/dashboard.css">
</head>
<body>
    <div class="dashboard-container">
        
        <?php
        require_once 'src/layout/nav.php';
        echo "<h1>Tableau de bord</h1>";
        
        switch ($_SESSION['role']) {
            case 'admin':
                echo "<p>Vous êtes administrateur.</p>";
                break;
            case 'prof':
                echo "<p>Vous êtes professeur.</p>";
                break;
            case 'student':
                echo "<p>Vous êtes étudiant.</p>";
                break;
        }

        echo '<a href="src/logout.php">Déconnexion</a>';
        ?>

    </div>
</body>
</html>
