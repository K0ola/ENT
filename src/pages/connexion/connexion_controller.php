<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST["login"];
    $password = $_POST["password"];
    
    $user = $userModel->getUserByLogin($login);

    if ($user && password_verify($password, $user["mot_de_passe"])) {
        $_SESSION["login"] = $user["login"];
        $_SESSION["prenom"] = $user["prenom_utilisateur"];
        $_SESSION["role"] = $user["role"];
        header('Location: /dashboard');
        exit();
    } else {
        $error = 'Login ou mot de passe incorrect.';
    }
}

require_once('connexion_view.php');?>
