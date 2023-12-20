<?php
session_start();
include('./connexion_bdd.php');

$requete =" SELECT * FROM utilisateurs WHERE login=:login";
$stmt=$db->prepare($requete);
$stmt->bindValue(':login',$_POST["login"],PDO::PARAM_STR);
$stmt->execute();

if($stmt->rowCount()){
    $result=$stmt->fetch();
    if(password_verify($_POST["password"],$result["mot_de_passe"])){
    $_SESSION["login"]=$result["login"];
    $_SESSION["prenom"] = $result["prenom_utilisateur"];
    header('location: ../../index.php');
    exit();
    }
    else{
        header("Location: ../../index.php?err=1");
    }
} else{
    header("Location: ../../index.php?err=1");
}
?>