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

    public function createUser($prenom, $nom, $login, $password, $email, $role, $class) {
        $stmt = $this->db->prepare("SELECT * FROM utilisateurs WHERE login = ?");
        $stmt->execute([$login]);

        if ($stmt->rowCount() > 0) {
            return "Erreur : cet utilisateur existe déjà.";
        } else {
            try {
                $sql = "INSERT INTO utilisateurs (prenom_utilisateur, nom_utilisateur, login, role_utilisateur, mot_de_passe, mail_utilisateur, classe_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$prenom, $nom, $login, $role, $password, $email, $class]);
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
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }
    
    public function resetPassword($token, $new_password) {
        $user = $this->getUserByToken($token);
        if ($user) {
            $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
            $updateStmt = $this->db->prepare("UPDATE utilisateurs SET mot_de_passe = ?, reset_token = NULL, token_expiry = NULL WHERE reset_token = ?");
            $success = $updateStmt->execute([$new_password_hash, $token]);
            if ($success) {
                return "Mot de passe réinitialisé avec succès.";
            } else {
                return "Erreur lors de la réinitialisation du mot de passe.";
            }
        } else {
            return "Le lien de réinitialisation est invalide ou a expiré.";
        }
    }
    

    public function getUsersByClass($classId) {
        $requete = "SELECT * FROM utilisateurs WHERE classe_id = :classe_id";
        $stmt = $this->db->prepare($requete);
        $stmt->bindValue(':classe_id', $classId, PDO::PARAM_INT);
        $stmt->execute();

        $tabclass = $stmt->fetchAll(PDO::FETCH_ASSOC);

        for ($i=0; $i < count($tabclass) ; $i++) {    

            $tabclass[$i]["icon_user"] = $this->findProfileImagePath("src/assets/user/", $tabclass[$i]["login"], $tabclass[$i]["id_utilisateur"]);
        }

        return $tabclass;
    }

    public function getConversationsByUser($userId) {
        $requete = "SELECT d.id_conv,
                           u1.id_utilisateur AS user_member_1,
                           u2.id_utilisateur AS user_member_2,
                           CASE
                               WHEN u1.id_utilisateur = :id_utilisateur THEN u2.prenom_utilisateur
                               ELSE u1.prenom_utilisateur
                           END AS prenom_autre_utilisateur,
                           CASE
                               WHEN u1.id_utilisateur = :id_utilisateur THEN u2.nom_utilisateur
                               ELSE u1.nom_utilisateur
                           END AS nom_autre_utilisateur,
                           CASE
                               WHEN u1.id_utilisateur = :id_utilisateur THEN u2.login
                               ELSE u1.login
                           END AS login_autre_utilisateur
                    FROM discussions d
                    JOIN utilisateurs u1 ON u1.id_utilisateur = d.user_member_1
                    JOIN utilisateurs u2 ON u2.id_utilisateur = d.user_member_2
                    WHERE d.user_member_1 = :id_utilisateur OR d.user_member_2 = :id_utilisateur";
        $stmt = $this->db->prepare($requete);
        $stmt->bindValue(':id_utilisateur', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $tabdiscus = $stmt->fetchAll(PDO::FETCH_ASSOC);

        for ($i=0; $i < count($tabdiscus) ; $i++) { 

            $otherid = 0;

            if ($tabdiscus[$i]["user_member_1"] == $userId) {
                $otherid = $tabdiscus[$i]["user_member_2"];
            } else {
                $otherid = $tabdiscus[$i]["user_member_1"];
            }        

            $tabdiscus[$i]["icon_autre_utilisateur"] = $this->findProfileImagePath("src/assets/user/", $tabdiscus[$i]["login_autre_utilisateur"], $otherid);
        }

        return $tabdiscus;
    }
    

    public function getMessagesByConversation($conversationId) {
        $requete = "SELECT m.id_message,
                           m.message,
                           m.date_message,
                           m.user_id,
                           u.prenom_utilisateur,
                           u.nom_utilisateur
                    FROM messages m
                    JOIN utilisateurs u ON u.id_utilisateur = m.user_id
                    WHERE m.conversation_id = :conversation_id
                    ORDER BY m.date_message ASC";
        $stmt = $this->db->prepare($requete);
        $stmt->bindValue(':conversation_id', $conversationId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }    


    public function checkConversationExists($userId, $camaradeId) {
        $requete = "SELECT id_conv FROM discussions WHERE (user_member_1 = :user_id AND user_member_2 = :camarade_id) OR (user_member_1 = :camarade_id AND user_member_2 = :user_id)";
        $stmt = $this->db->prepare($requete);
        $stmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
        $stmt->bindValue(':camarade_id', $camaradeId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function createMessage($userId, $conversationId, $message) {
            try {
                $sql = "INSERT INTO messages (user_id, conversation_id, message, date_message) VALUES (?, ?, ?, NOW())";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$userId, $conversationId, $message]);
                return true;
            } catch (PDOException $e) {
                // Renvoyer le message d'erreur pour un débogage plus facile.
                return "Erreur de base de données : " . $e->getMessage();
            }
        }
        
        
        public function createConversation($user1, $user2) {
            try {
                $sql = "INSERT INTO discussions (user_member_1, user_member_2) VALUES (?, ?)";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$user1, $user2]);
                return $this->db->lastInsertId();
            } catch (PDOException $e) {
                return "Erreur : " . $e->getMessage();
            }
        }
        
    
        public function findProfileImagePath($baseDir, $login, $userId) {
            $extensions = ['jpg', 'png', 'jpeg', 'gif', 'webp'];
            foreach ($extensions as $ext) {
                $filePath = $baseDir . "pdp_user_" . $login . "_" . $userId . "." . $ext;
                if (file_exists($filePath)) {
                    return $filePath;
                }
            }
            return "src/assets/user/user_icon.png"; // Assurez-vous que ce chemin vers l'image par défaut est correct
        }
        
    
}