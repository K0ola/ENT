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


$_SESSION["icon_user"] = $userModel->findProfileImagePath("src/assets/user/", $_SESSION['login'], $_SESSION['id_utilisateur']);


require_once('profil_view.php');

?>