<?php
require_once('src/model.php');
$userModel = new UserModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mail = filter_var(trim($_POST["mail"]), FILTER_SANITIZE_EMAIL);
    $token = bin2hex(random_bytes(20));

    $stmt = $userModel->prepare("UPDATE utilisateurs SET reset_token = :token, token_expiry = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE mail_utilisateur = :mail");
    $stmt->execute(['token' => $token, 'mail' => $mail]);
    
    $recipient = $mail;
    $subject = "Demande de réinitialisation de mot de passe";
    $email_content = "Pour réinitialiser votre mot de passe, veuillez cliquer sur le lien suivant:\n\n";
    $email_content .= "http://ent-mmi.site/reset?token=" . $token . "\n\n";
    $email_content .= "Si vous n'avez pas demandé la réinitialisation, ignorez cet e-mail.\n";
    
    $email_headers = "From: ent <no-reply@ent-mmi.site>";
    
    if (mail($recipient, $subject, $email_content, $email_headers)) {
        echo "Un lien de réinitialisation de mot de passe a été envoyé à votre adresse e-mail.";
    } else {
        echo "Une erreur est survenue lors de l'envoi de l'e-mail de réinitialisation.";
    }
}

require_once('mdp_forget_view.php'); 
?>
