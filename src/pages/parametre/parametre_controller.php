<?php

session_start();

require_once('src/model.php');
$userModel = new UserModel();

if (!isset($_SESSION['login'])) {
    header('Location: /connexion');
    exit();
}

$prenom = $_SESSION['prenom'];
$nom = $_SESSION['nom'];
$login = $_SESSION['login'];
$role = $_SESSION['role'];
$class = $_SESSION['class'];

require_once('parametre_view.php');

?>