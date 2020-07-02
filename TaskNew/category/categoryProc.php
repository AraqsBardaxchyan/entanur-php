<?php
session_start();
include "../config/connect.php";

if (isset($_POST['add'])) {
    if (isset($_POST['cat_name']) && !empty($_POST['cat_name'])){
        $categoryName = $_POST['cat_name'];
        $insert = mysqli_query($connect, "INSERT INTO `category` (`category_name`) VALUES ('$categoryName')");
        if ($insert){
            header("location:../post.php");
        }else {
            $_SESSION['smt'] = "Something went wrong";
        }

    }else {
        $_SESSION['cat_name_error'] = "Fill the field";
    }
}