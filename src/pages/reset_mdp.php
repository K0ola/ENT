<?php
session_start();


error_reporting(E_ALL);
ini_set('display_errors', 1);

function getDbConnection() {
    $host = 'localhost';
    $dbname = 'u972668351_ent';
    $port = '3306';
    $charset = 'utf8';
    $user = 'u972668351_root';
    $pass = '7?O|p6T!n';

    try {
        $db = new PDO("mysql:host=$host;dbname=$dbname;port=$port;charset=$charset", $user, $pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        error_log($e->getMessage());
        exit('Une erreur de connexion à la base de données est survenue.');
    }
}

try {
    if (isset($_GET['token']) && !empty($_GET['token'])) {
        $token = $_GET['token'];
        $db = getDbConnection();

        $stmt = $db->prepare("SELECT * FROM utilisateurs WHERE reset_token = ? AND token_expiry > NOW()");
        $stmt->execute([$token]);
        $user = $stmt->fetch();

        if ($user) {

            ?>
            <form action="reset_mdp.php" method="post">
                <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
                <input type="password" name="new_password" required>
                <input type="password" name="confirm_password" required>
                <input type="submit" value="Réinitialiser le mot de passe">
            </form>
            <?php
        } else {
            echo "Le lien de réinitialisation est invalide ou a expiré.";
        }
    } elseif (isset($_POST['token']) && !empty($_POST['token'])) {
        $token = $_POST['token'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        if ($new_password === $confirm_password) {
            $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);

            $db = getDbConnection();
            $stmt = $db->prepare("UPDATE utilisateurs SET mot_de_passe = ?, reset_token = NULL, token_expiry = NULL WHERE reset_token = ?");
            $result = $stmt->execute([$new_password_hash, $token]);

            if ($result) {
                header('Location: ../../index.php');
                exit;
            } else {
                echo "Une erreur est survenue lors de la réinitialisation de votre mot de passe.";
            }
        } else {
            echo "Les mots de passe ne correspondent pas.";
        }
    } else {
        echo "Aucun token fourni.";
    }
} catch (Exception $e) {
    error_log($e->getMessage());
    echo "Une erreur est survenue. Veuillez réessayer plus tard.";
}
?>
