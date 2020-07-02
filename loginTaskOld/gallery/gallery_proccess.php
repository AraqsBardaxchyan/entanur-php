<?php
session_start();
include "../config/connect.php";
//echo "<pre>";
//var_dump($_FILES);die;
$id = $_SESSION['user_id'];
$target_dir = '../assets/gallery/';
$count = count($_FILES['upload']);
//var_dump($count);die;
for ($i = 0; $i < $count; $i++) {
    $imageName = uniqid(). basename($_FILES['upload']['name'][$i]);
    $target_file = $target_dir . $imageName;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    if ($_FILES['upload']['size'][$i] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif') {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded";
    } else {
        if (move_uploaded_file($_FILES['upload']['tmp_name'][$i], $target_file)) {
            $insert = mysqli_query($connect, "INSERT INTO `gallery` (`user_id`, `img_name`) VALUES ('$id', '$imageName')");
            if ($insert) {
                header("location:gallery.php");
            } else {
                echo 0;
            }

        } else {
            echo "Sorry, there was an error uploading your file";
        }
    }
}