<?php
// create_discussion.php
session_start();
require_once('src/model.php');
$userModel = new UserModel();

if (isset($_GET['member_id']) && isset($_SESSION['login'])) {
    // Récupérer l'utilisateur connecté
    $loggedInUser = $userModel->getUserByLogin($_SESSION['login']);
    $loggedInUserId = $loggedInUer['id_utilisateur'];
    $memberId = $_GET['member_id'];

    // Vérifiez que l'utilisateur connecté et le membre sélectionné ne sont pas les mêmes
    if ($loggedInUserId != $memberId) {
        // Créer une nouvelle discussion
        $discussionId = $userModel->createConversation($loggedInUserId, $memberId);

        if ($discussionId) {
            // Rediriger vers la page de la discussion
            header('Location: /discussion?id_conv=' . $discussionId);
            exit();
        } else {
            echo "Erreur lors de la création de la discussion.";
            // Gérer l'erreur en conséquence
        }
    } else {
        echo "Vous ne pouvez pas démarrer une discussion avec vous-même.";
        // Gérer l'erreur en conséquence
    }
} else {
    echo "Informations nécessaires pour démarrer une discussion manquantes.";
    // Gérer l'erreur en conséquence
}
