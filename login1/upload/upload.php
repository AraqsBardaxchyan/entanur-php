<?php
session_start();
include "../config/connect.php";

$id = $_SESSION['user_id'];
$target_dir = '../assets/images/';
$imageName = uniqid(). basename($_FILES['file']['name']);
$target_file = $target_dir . $imageName;
$old_avatar = $_POST['old_avatar'];
$uploadOk = 1;

$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (file_exists($target_file)){
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
if ($_FILES['file']['size'] > 5000000){
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif'){
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed";
    $uploadOk = 0;
}

if ($old_avatar != 'female.png' || $old_avatar != 'male.jpg'){
    if (file_exists('../assets/images/'. $old_avatar)){
        unlink('../assets/images/'. $old_avatar);
    }
}

if ($uploadOk == 0){
    echo "Sorry, your file was not uploaded";
}else {
    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
        $update = mysqli_query($connect, "UPDATE `users` SET `avatar` = '$imageName' WHERE `id`= '$id'");
        header("location: ../Profile.php");
    }else {
        echo "Sorry, there was an error uploading your file";
    }
}