<?php
session_start();
require_once('src/model.php');
$userModel = new UserModel();

if (!isset($_SESSION['login'])) {
    header('Location: index.php?p=connexion');
    exit();
}

$prenom = $_SESSION['prenom'];
$nom = $_SESSION['nom_utilisateur'];
$login = $_SESSION['login'];
$role = $_SESSION['role'];
$class = $_SESSION['classe_id'];

require_once('profil_view.php');
