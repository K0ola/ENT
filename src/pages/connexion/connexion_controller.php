<?php
if ($_SERVER ['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['error'])) {
        $error = 'Login ou mot de passe incorrect.';
        echo $error;
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST["login"];
    $password = $_POST["password"];
    
    $user = $userModel->getUserByLogin($login);

    if ($user && password_verify($password, $user["mot_de_passe"])) {
        $_SESSION["login"] = $user["login"];
        $_SESSION["prenom"] = $user["prenom_utilisateur"];
        $_SESSION["nom"] = $user["nom_utilisateur"];
        $_SESSION["class"] =$user["classe_id"];
        $_SESSION["role"] = $user["role"];
        $_SESSION["id_utilisateur"] = $user["id_utilisateur"];
        header('Location: /dashboard');
        exit();
    } else {
        header('Location: /connexion?error=1');
    }
}

require_once('connexion_view.php');?>
