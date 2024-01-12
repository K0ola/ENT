function refreshMessages() {
    const discussionContainer = document.querySelector('.discussion-container');
    const conversationId = discussionContainer.getAttribute('data-conversation-id');

    if (conversationId) {
        fetch('src/pages/discussion/get_messages.php?conversation_id=' + conversationId)
        .then(response => response.text())
            .then(data => {
                document.querySelector('.message-list').innerHTML = data;
                const messageBox = document.querySelector('.message-list');
                messageBox.scrollTop = messageBox.scrollHeight; // Pour faire défiler vers le bas
            })
            .catch(error => console.error('Erreur:', error));
    }
}

setInterval(refreshMessages, 1000); // Rafraîchir toutes les 3 secondes
