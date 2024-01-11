<?php
session_start();

$target_dir = "src/assets/user/";
$fileName = basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

$newFileName = "pdp_user_" . $_SESSION['login'] . "_" . $_SESSION['id_utilisateur'];
$extensions = ['jpg', 'png', 'jpeg', 'gif', 'webp'];

foreach ($extensions as $ext) {
    $oldFilePath = $target_dir . $newFileName . "." . $ext;
    if (file_exists($oldFilePath)) {
        unlink($oldFilePath);
    }
}

$target_file = $target_dir . $newFileName . "." . $imageFileType;
$uploadOk = 1;

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "Le fichier n'est pas une image.";
        $uploadOk = 0;
    }
}


if ($uploadOk == 0) {
    echo "Désolé, votre fichier n'a pas été téléchargé.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        header('Location: /profil');
    } else {
        echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
    }
}
?>