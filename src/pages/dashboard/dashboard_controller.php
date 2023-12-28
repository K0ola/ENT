<?php
session_start();
require_once('src/model.php');
$userModel = new UserModel();

if (!isset($_SESSION['login'])) {
    header('Location: /connexion');
    exit();
}

if (empty($_SESSION['role'])) {
    $role = $userModel->getUserRole($_SESSION['login']);
    if ($role) {
        $_SESSION['role'] = $role;
    } else {
        echo "Erreur lors de la récupération du rôle de l'utilisateur.";
        exit();
    }
}

require_once('dashboard_view.php');

