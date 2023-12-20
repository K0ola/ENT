<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administration</title>
</head>
<?php
    $requete =" SELECT * FROM utilisateurs";
    $stmt=$db->query($requete);
    $result=$stmt->fetchall(PDO::FETCH_ASSOC);
    ?>
<body>
    <h1>TU ES BIEN CONNECTE EN TANT QU'ADMIN ...</h1>
    <a href="./src/scripts/logout.php">Deconnection</a>
    
</body>
</html>