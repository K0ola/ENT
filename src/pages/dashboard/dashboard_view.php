<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Tableau de bord</title>
    <link rel="stylesheet" href="src/root.css">
    <link rel="stylesheet" href="src/layout/styles/theme.css">
    <link rel="stylesheet" href="src/pages/dashboard/styles/dashboard.css">
</head>
<body class="Tropical-Blue">
    <div class="dashboard-container">
        
        <?php
        require_once 'src/layout/nav.php';      
        switch ($_SESSION['role']) {
            case 'admin':
                require_once 'src/pages/dashboard/admin.php';
                break;
            case 'prof':
                require_once 'src/pages/dashboard/prof.php';
                break;
            case 'student':
                require_once 'src/pages/dashboard/student.php';
                break;
        }
        ?>

    </div>
    <?php require_once 'src/layout/discussion.php'; ?>
</body>
</html>
