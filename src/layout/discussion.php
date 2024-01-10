<?php 
session_start(); 
require_once 'src/model.php';

$userModel = new UserModel();
$userId = $_SESSION['id_utilisateur'] ?? null;

if (!$userId) {
    header('Location: connexion.php');
    exit();
}

$conversations = $userModel->getConversationsByUser($userId);
?>

<link rel="stylesheet" href="src/layout/styles/discussion.css">
<script src="src/layout/script/discussion.js"></script>

<div id="discussion-box">
    <div id="top-disc" onclick="toggleDiscussion()">
        <p>Discussion</p>
    </div>
    <section id="list-conversations">
        <a href="/discussion">Démarrer une conversation</a>
        <?php foreach ($conversations as $conversation): ?>
            <div class="conversation-link">
                <a href="/discussion?conversation_id=<?php echo $conversation['id_conv']; ?>">
                    <div class="user-info">
                        <div class="name-last-message">
                            <p><?php echo htmlspecialchars($conversation['prenom_autre_utilisateur'] . " " . $conversation['nom_autre_utilisateur']); ?></p>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </section>
</div>
