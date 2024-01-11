<?php session_start()?>

<section class="row">
    <div class="col-12">
    <h1>Mon Profil</h1>
    <p>Prénom : <?= $prenom ?></p>
    <p>Nom : <?= $nom ?></p>
    <p>Login : <?= $login ?></p>
    <p>Rôle : <?= $role ?></p>
    <p>classe : <?php if($class == 1){
        echo "MMI 1 | TP - A";
    } else if($class == 2){
        echo "MMI 1 | TP - B";
    } else if($class == 3){
        echo "MMI 1 | TP - C";
    } else if($class == 4){
        echo "MMI 1 | TP - D";
    } else if($class == 5){
        echo "MMI 2 | TP - A";
    } else if($class == 6){
        echo "MMI 2 | TP - B";
    } else if($class == 7){
        echo "MMI 2 | TP - C";
    } else if($class == 8){
        echo "MMI 1 | TP - D";
    }?></p>
    </div>
</section>