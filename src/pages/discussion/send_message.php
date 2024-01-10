<?php
session_start();
require_once('src/model.php');
$userModel = new UserModel();

function sendMessage($userId, $conversationId, $message) {
    global $userModel; 

    try {
        if ($userModel->createMessage($userId, $conversationId, $message)) {
            return true;
        } else {
            return "Erreur lors de l'ajout du message dans la base de données.";
        }
    } catch (Exception $e) {
        return "Erreur : " . $e->getMessage();
    }
}

var_dump($_POST);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'], $_POST['conversation_id'])) {

    $message = $_POST['message'];
    $conversationId = $_POST['conversation_id'];
    $userId = $_SESSION['id_utilisateur'];

    $result = sendMessage($userId, $conversationId, $message);

    if ($result === true) {
        header("Location: /discussion?conversation_id=" . $conversationId);
        exit;
    } else {
        echo "Erreur lors de l'envoi du message : " . $result;
    }
}
?>
