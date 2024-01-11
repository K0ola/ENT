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

function findProfileImagePath($baseDir, $login, $userId) {
    $extensions = ['jpg', 'png', 'jpeg', 'gif']; 
    foreach ($extensions as $ext) {
        $filePath = $baseDir . "pdp_user_" . $login . "_" . $userId . "." . $ext;
        if (file_exists($filePath)) {
            return $filePath;
        }
    }
    return "src/assets/user/user_icon.png"; // Assurez-vous que ce chemin vers l'image par défaut est correct
}

$imagePath = findProfileImagePath("src/assets/user/", $_SESSION['login'], $_SESSION['id_utilisateur']);


require_once('profil_view.php');

?>