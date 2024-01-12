<?php
session_start();
require_once('../../model.php');
$userModel = new UserModel();

$conversationId = $_GET['conversation_id'] ?? null;
$messages = [];

if ($conversationId) {
    $messages = $userModel->getMessagesByConversation($conversationId);
    foreach ($messages as $message) {
        $class = ($message['prenom_utilisateur'] == $_SESSION['prenom'] && $message['nom_utilisateur'] == $_SESSION['nom']) ? "message_D" : "";
        echo "<div class=\"" . $class . " message\">
                <div class=\"message-header\">
                    <p class=\"txt_bold\">" . htmlspecialchars($message['prenom_utilisateur']) . ' ' . htmlspecialchars($message['nom_utilisateur']) . "</p>
                </div>
                <div class=\"message-content\">
                    " . htmlspecialchars($message['message']) . "
                </div>
                <span class=\"txt_micro message-date\">" . date('d/m - H:i', strtotime($message['date_message'])) . "</span>
              </div>";
    }
}
?>
