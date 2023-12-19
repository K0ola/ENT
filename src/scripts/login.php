<?php
include('./connexion_bdd.php');
$requete =" SELECT * FROM utilisateurs WHERE login=:login";
$stmt=$db->prepare($requete);
$stmt->bindValue(':login',$_GET["login"],PDO::PARAM_STR);
$stmt->execute();

if($stmt->rowCount()){
    $result=$stmt->fetch();
    if(password_verify($_GET["password"],$result["mot_de_passe"])){
    $_SESSION["login"]=$result["login"];
    require('../../index.php');
    }
    else{
        header("Location: ../../index.php?err=1");
    }
} else{
    header("Location: ../../index.php?err=1");
}
?>