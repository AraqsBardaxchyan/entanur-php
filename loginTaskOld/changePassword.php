<?php
session_start();
include "config/connect.php";
$id = $_SESSION['user_id'];

if (isset($_POST['change'])) {
    if (isset($_POST['old']) && !empty($_POST['old'])){
        $old_password = $_POST['old'];
    }
    if (isset($_POST['new']) && !empty($_POST['new'])){
        $new_password = $_POST['new'];
    }
    if (isset($_POST['confirm']) && !empty($_POST['confirm'])){
        $confirm_password = $_POST['confirm'];
    }

    $select = mysqli_query($connect, "SELECT * FROM `users` WHERE `id`='$id'");
    $data = mysqli_fetch_assoc($select);
    $sdf = password_verify($old_password,$data['password']);
    if ($sdf){
        if ($new_password == $confirm_password){
            $new_pass = crypt($new_password);
            $update = mysqli_query($connect, "UPDATE `users` SET `password`='$new_pass' WHERE `id`='$id'");
            if ($update){
                header("location:Login/login.php");
            }

        }
    }
}