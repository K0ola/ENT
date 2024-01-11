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

<div id="discussion-box">
    <div class="container-disc">
        <div id="top-disc">
            <svg class="Icon Icon_Medium" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M18 9H20C20.5304 9 21.0391 9.21071 21.4142 9.58579C21.7893 9.96086 22 10.4696 22 11V22L18 18H12C11.4696 18 10.9609 17.7893 10.5858 17.4142C10.2107 17.0391 10 16.5304 10 16V15M14 9C14 9.53043 13.7893 10.0391 13.4142 10.4142C13.0391 10.7893 12.5304 11 12 11H6L2 15V4C2 2.9 2.9 2 4 2H12C12.5304 2 13.0391 2.21071 13.4142 2.58579C13.7893 2.96086 14 3.46957 14 4V9Z" stroke="#09090B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <p class="txt_nav">Discussion</p>
            <svg class="Icon Icon_Large chevron" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M18 15L12 9L6 15" stroke="#09090B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <div id="list-conversations">
            <?php foreach ($conversations as $conversation): ?>
                <a class="txt_bold conversation" href="/discussion?conversation_id=<?php echo $conversation['id_conv']; ?>">
                    <img class="Icon_Big profil_Pic"src="<?= $conversation['icon_autre_utilisateur'] ?>" loading="lazy"/>
                    <p><?php echo $conversation['prenom_autre_utilisateur'] . ' ' . $conversation['nom_autre_utilisateur']; ?></p>
                </a>
            <?php endforeach; ?>
            <a class="txt_regular demarrer" href="/discussion">Démarrer une conversation</a>
        </div>
    </div>
    <script src="src/layout/script/discussion.js"></script>
</div>
