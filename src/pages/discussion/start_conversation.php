<?php
session_start();
require_once('src/model.php');
$userModel = new UserModel();

$userId = $_SESSION['id_utilisateur'];
$id_camarade = $_GET['id_camarade'] ?? null;
if ($id_camarade) {
    $existingConversation = $userModel->checkConversationExists($userId, $id_camarade);
    if ($existingConversation) {
        $conversationId = $existingConversation['id_conv'];
    } else {
        $conversationId = $userModel->createConversation($userId, $id_camarade);
    }
    header("Location: /discussion?conversation_id=" . $conversationId);
    exit;
}
