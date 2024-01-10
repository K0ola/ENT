<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/layout/styles/theme.css">
    <link rel="stylesheet" href="src/pages/discussion/styles/discussion.css">
    <title>Discussion</title>
</head>
r<?php require_once('src/layout/nav.php'); ?>
<body>
    <div class="discussion-container">
        <div class="sidebar">
            <div class="conversation-list">
                <?php foreach ($conversations as $conversation): ?>

                    <div class="conversation">
                        <a href="?conversation_id=<?php echo $conversation['id_conv']; ?>">
                            <?php echo $conversation['prenom_autre_utilisateur'] . ' ' . $conversation['nom_autre_utilisateur']; ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="classmate-list">
            <?php foreach ($filteredClassmates as $classmate): ?>
                <div class="classmate">
                    <a href="/start_conversation?id_camarade=<?php echo $classmate['id_utilisateur']; ?>">
                        <?php echo $classmate['prenom_utilisateur'] . ' ' . $classmate['nom_utilisateur']; ?>
                        </a>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
        <div class="current-conversation">
            <div class="message-list">
                <?php if ($interlocutor): ?>
                    <h1><?php echo $interlocutor; ?></h1>
                <?php endif; ?>

                <?php foreach ($messages as $message): ?>
                    <div class="message">
                        <div class="message-header">
                            <?php echo $message['prenom_utilisateur'] . ' ' . $message['nom_utilisateur']; ?>
                            <span class="message-date"><?php echo $message['date_message']; ?></span>
                        </div>
                        <div class="message-content">
                            <?php echo $message['message']; ?>
                        </div>
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
        </div>
    </div>
</body>
</html>
