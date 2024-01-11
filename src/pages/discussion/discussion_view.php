
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/root.css">
    <link rel="stylesheet" href="src/layout/styles/theme.css">
    <link rel="stylesheet" href="src/layout/styles/nav.css">
    <link rel="stylesheet" href="src/pages/discussion/styles/discussion.css">
	<link rel="icon" href="src/assets/outils/Univ_eiffel.svg"/>
    <title>Discussion</title>
</head>
<body class="Tropical-Blue">
    
    <script src="src/layout/script/theme.js"></script>
    <?php require_once('src/layout/nav.php'); ?>

    <div class="discussion-container">
        <div class="sidebar <?php if (isset($_GET["conversation_id"])) { echo "Hidden_Sidebar";}?>">
            <h1 class="txt_h1">Discussion</h1>

            <div>
                <div class="conversation-list">
                    <h2 class="txt_h3">Mes conversations</h2>
                    <?php foreach ($conversations as $conversation): ?>

                        <a class="txt_bold conversation" href="?conversation_id=<?php echo $conversation['id_conv']; ?>">
                            <img class="Icon_Big profil_Pic"src="<?= $conversation['icon_autre_utilisateur'] ?>" loading="lazy"/>
                            <p><?php echo $conversation['prenom_autre_utilisateur'] . ' ' . $conversation['nom_autre_utilisateur']; ?></p>
                        </a>

                    <?php endforeach; ?>
                </div>
                <?php if(count($filteredClassmates) > 0): ?>
                <hr>
                <div class="classmate-list">
                    <h2 class="txt_h3">Nouvelle conversation</h2>
                    <?php foreach ($filteredClassmates as $classmate): ?>

                        <a class="txt_bold classmate" href="/start_conversation?id_camarade=<?php echo $classmate['id_utilisateur']; ?>">
                            <img class="Icon_Big profil_Pic"src="<?= $classmate['icon_user'] ?>" loading="lazy"/>
                            <p><?php echo $classmate['prenom_utilisateur'] . ' ' . $classmate['nom_utilisateur']; ?></p>
                        </a>

                    <?php endforeach; ?>

                </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="current-conversation <?php if (!isset($_GET["conversation_id"])) { echo "Hidden_conversation";}?>">
            <?php if (isset($_GET["conversation_id"])): ?>

                <?php if ($interlocutor): ?>
                    <div class="interlocuteur">
                        <a href="/discussion" class="back">retour</a>
                        <img class="Icon_Big profil_Pic"src="<?= $icon_interlocutor ?>" loading="lazy"/>
                        <h2 class="txt_h3"><?php echo $interlocutor; ?></h2>
                    </div>
                <?php endif; ?>

                <div class="message-list">

                    <?php foreach ($messages as $message): ?>
                        <div class="<?php if ($message['prenom_utilisateur'] == $_SESSION['prenom'] && $message['nom_utilisateur'] == $_SESSION['nom']) { echo "message_D";}?> message">
                            <div class="message-header">
                                <p class="txt_bold"><?php echo $message['prenom_utilisateur'] . ' ' . $message['nom_utilisateur']; ?></p>
                            </div>
                            <div class="message-content">
                                <?php echo $message['message']; ?>
                            </div>
                            <span class="txt_micro message-date"><?php echo date('d/m - H:i', strtotime($message['date_message'])); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="message-form">
                    <form action="/send_message" method="post">
                        <input type="hidden" name="conversation_id" value="<?php echo $selectedConversationId; ?>">
                        <input type="text" name="message" id="message" placeholder="Votre message">
                        <input type="submit" value="Envoyer">
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <script src="src/layout/script/burger.js"></script>
    <script>
        const messageBox = document.querySelector('.message-list');
        messageBox.scrollTop = messageBox.scrollHeight;
    </script>
</body>
</html>