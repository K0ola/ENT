<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/root.css">
    <link rel="stylesheet" href="src/layout/styles/theme.css">
    <link rel="stylesheet" href="src/pages/discussion/styles/discussion.css">
    <title>Discussion</title>
</head>
<?php require_once('src/layout/nav.php'); ?>
<body>
    <div class="discussion-container">
        <div class="sidebar">
            <h1 class="txt_h1">Discussion</h1>

            <div>
                <div class="conversation-list">
                    <h2 class="txt_h3">Mes conversations</h2>
                    <?php foreach ($conversations as $conversation): ?>

                        <a class="conversation" href="?conversation_id=<?php echo $conversation['id_conv']; ?>">
                            <?php echo $conversation['prenom_autre_utilisateur'] . ' ' . $conversation['nom_autre_utilisateur']; ?>
                        </a>

                    <?php endforeach; ?>
                </div>
                <?php if(count($filteredClassmates) > 0): ?>
                <hr>
                <div class="classmate-list">
                    <h2 class="txt_h3">Nouvelle conversation</h2>
                    <?php foreach ($filteredClassmates as $classmate): ?>
                        <a class="classmate" href="/start_conversation?id_camarade=<?php echo $classmate['id_utilisateur']; ?>">
                            <?php echo $classmate['prenom_utilisateur'] . ' ' . $classmate['nom_utilisateur']; ?>
                        </a>
                    <?php endforeach; ?>

                </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="current-conversation">
            <?php if (isset($_GET["conversation_id"])): ?>
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
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
