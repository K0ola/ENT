<?php
session_start();
require_once('src/model.php');
$userModel = new UserModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['token'])) {
    $token = $_POST['token'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password === $confirm_password) {
        $result = $userModel->resetPassword($token, $new_password);
        if ($result === true) {
            $_SESSION['message'] = 'Votre mot de passe a été réinitialisé avec succès.';
            header('Location: /connexion');
            exit;
        } else {
            $error = $result;
        }
    } else {
        $error = "Les mots de passe ne correspondent pas.";
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET['token'])) {
    $token = $_GET['token'];
    $user = $userModel->getUserByToken($token);
    if (!$user) {
        $error = "Le lien de réinitialisation est invalide ou a expiré.";
    }
}

require_once('reset_mdp_view.php');
?>
