<?php
class UserModel {
    private $db;

    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=127.0.0.1;dbname=u972668351_ent;port=3306;charset=utf8', 'u972668351_root', '7?O|p6T!n');
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public function prepare($sql) {
        return $this->db->prepare($sql);
    }

    public function getUserByLogin($login) {
        $requete = "SELECT * FROM utilisateurs WHERE login=:login";
        $stmt = $this->db->prepare($requete);
        $stmt->bindValue(':login', $login, PDO::PARAM_STR);
        $stmt->execute();

        
        return ($stmt->rowCount() > 0) ? $stmt->fetch() : null;
    }

    public function getUserRole($login) {
        $requete = "SELECT role_utilisateur FROM utilisateurs WHERE login=:login";
        $stmt = $this->db->prepare($requete);
        $stmt->bindValue(':login', $login, PDO::PARAM_STR);
        $stmt->execute();
    
        
        return ($stmt->rowCount() > 0) ? $stmt->fetch(PDO::FETCH_ASSOC)['role_utilisateur'] : null;

    }
    

    public function getAllUsers() {
        $requete = "SELECT * FROM utilisateurs";
        $stmt = $this->db->query($requete);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createUser($prenom, $nom, $login, $role, $password, $email, $class) {
        $stmt = $this->db->prepare("SELECT * FROM utilisateurs WHERE login = ?");
        $stmt->execute([$login]);

        if ($stmt->rowCount() > 0) {
            return "Erreur : cet utilisateur existe déjà.";
        } else {
            try {
                $sql = "INSERT INTO utilisateurs (prenom_utilisateur, nom_utilisateur, login, role_utilisateur, mot_de_passe, mail_utilisateur, classe_utilisateur) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$prenom, $nom, $login, $role, $password, $email]);
                return "Nouvel utilisateur créé avec succès.";
            } catch (PDOException $e) {
                return "Erreur : " . $e->getMessage();
            }
        }
    }

    public function deleteUser($id) {
        try {
            $sql = "DELETE FROM utilisateurs WHERE id_utilisateur = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            return "Utilisateur supprimé avec succès.";
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }

    public function getUserByToken($token) {
        $stmt = $this->db->prepare("SELECT * FROM utilisateurs WHERE reset_token = ? AND token_expiry > NOW()");
        $stmt->execute([$token]);
        return $stmt->fetch();
    }
    
    public function resetPassword($token, $new_password) {
        $user = $this->getUserByToken($token);
        if ($user) {
            $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
            $updateStmt = $this->db->prepare("UPDATE utilisateurs SET mot_de_passe = ?, reset_token = NULL, token_expiry = NULL WHERE reset_token = ?");
            return $updateStmt->execute([$new_password_hash, $token]);
        } else {
            return "Le lien de réinitialisation est invalide ou a expiré.";
        }
    }
    
}


