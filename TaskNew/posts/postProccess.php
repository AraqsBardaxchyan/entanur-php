<?php
session_start();
include "../config/connect.php";

$id = $_SESSION['user_id'];
//$select = mysqli_query($connect,"SELECT * FROM `users` WHERE `user_id`='$id'");
//echo "<pre>";
//var_dump($_FILES);
//var_dump($_POST['upload']);
//
//var_dump($_POST);die;
if(isset($_POST['postbtn'])){
    if(isset($_POST['title']) && !empty($_POST['title'])){
        $title = $_POST['title'];
//        $_SESSION['title'] = $title;
    }
    if(isset($_POST['description']) && !empty($_POST['description'])){
        $description = $_POST['description'];
//        $_SESSION['description'] = $description;
    }
    if(isset($_POST['select_cat']) && !empty($_POST['select_cat'])){
        $categoryId = $_POST['select_cat'];
//        $_SESSION['description'] = $description;
    }



//    echo "<pre>";
//    var_dump($_POST);

    $imageName = uniqid(). basename($_FILES['nkarik']['name']);
    $target_dir = "../assets/postimages/";
    $target_file = $target_dir . $imageName;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded";
    } else {

        if (move_uploaded_file($_FILES['nkarik']['tmp_name'], $target_file)) {
            $insert = mysqli_query($connect, "INSERT INTO `posts` (`user_id`, `category_id`, `title`, `description`,`img_name`) VALUES ('$id', $categoryId, '$title','$description','$imageName')");
            if ($insert) {
                header("location:../postpage.php");
            }

            }
        }
//    if ($_SESSION['post']) {
//        header('location:../post.php');die;
//    } else {

        }


?>
