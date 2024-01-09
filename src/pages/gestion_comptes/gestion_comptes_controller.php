<?php
require_once('src/model.php');

$userModel = new UserModel();
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $login = $_POST['login'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $role = $_POST['role'];
    $class = $_POST['class'];
    

    if ($userModel->getUserByLogin($login)) {
        $message = 'Erreur : cet utilisateur existe déjà.';
    } else {
        
        $createResult = $userModel->createUser($prenom, $nom, $login, $password, $email, $role, $class);
        $message = $createResult;
    }
}

if (isset($_GET['id'])) {
    $deleteResult = $userModel->deleteUser($_GET['id']);
    $message = $deleteResult;
}

$utilisateurs = $userModel->getAllUsers();

require_once('gestion_comptes_view.php');
?>
