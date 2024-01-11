<?php
session_start();
require_once('src/model.php');
$userModel = new UserModel();



$userId = $_SESSION['id_utilisateur'];
$classId = $_SESSION['class'];

$conversations = $userModel->getConversationsByUser($userId);

$classmates = $userModel->getUsersByClass($classId);

$selectedConversationId = $_GET['conversation_id'] ?? null;
$messages = [];

$userIdsWithConversations = array_unique(array_merge(
    array_column($conversations, 'user_member_1'),
    array_column($conversations, 'user_member_2')
));

$userIdsWithConversations = array_filter($userIdsWithConversations, function($id) use ($userId) {
    return $id != $userId;
});

$filteredClassmates = array_filter($classmates, function ($classmate) use ($userIdsWithConversations) {
    return !in_array($classmate['id_utilisateur'], $userIdsWithConversations);
});


if ($selectedConversationId) {
    $messages = $userModel->getMessagesByConversation($selectedConversationId);
}


$interlocutor = null;
if ($selectedConversationId) {
    $messages = $userModel->getMessagesByConversation($selectedConversationId);
    foreach ($conversations as $conversation) {
        if ($conversation['id_conv'] == $selectedConversationId) {
            $interlocutor = $conversation['prenom_autre_utilisateur'] . ' ' . $conversation['nom_autre_utilisateur'];
            $icon_interlocutor = $conversation['icon_autre_utilisateur'];
            break;
        }
    }
}

$activeConversationIds = array_map(function ($conv) { return $conv['id_conv']; }, $conversations);
$filteredClassmates = array_filter($classmates, function ($classmate) use ($activeConversationIds) {
    foreach ($activeConversationIds as $convId) {
        if ($classmate['id_conv'] == $convId) {
            return false;
        }
    }
    return true;
});

$activeConversationUserIds = [];
foreach ($conversations as $conversation) {
    if (!in_array($conversation['user_member_1'], $activeConversationUserIds)) {
        $activeConversationUserIds[] = $conversation['user_member_1'];
    }
    if (!in_array($conversation['user_member_2'], $activeConversationUserIds)) {
        $activeConversationUserIds[] = $conversation['user_member_2'];
    }
}
$filteredClassmates = array_filter($classmates, function ($classmate) use ($activeConversationUserIds, $userId) {
    return !in_array($classmate['id_utilisateur'], $activeConversationUserIds) && $classmate['id_utilisateur'] != $userId;
});

require_once('discussion_view.php');

?>
