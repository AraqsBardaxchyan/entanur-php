<?php
session_start();
include "../config/connect.php";

if(isset($_POST['login'])){
if(isset($_POST['email']) && !empty($_POST['email'])) {
    $email = $_POST['email'];
}else {
    $_SESSION['login']['error_email'] = "Email filed is empty";
}
    if(isset($_POST['password']) && !empty($_POST['password'])) {
        $password = $_POST['password'];
    }else {
        $_SESSION['login']['error_password'] = "Password filed is empty";
    }
$sql="SELECT * FROM `users` WHERE `email` = '$email'";
$data = mysqli_query($connect,$sql);
$user = mysqli_fetch_assoc($data);
//var_dump($user);die();
if ($user){
    $pass = password_verify($password,$user['password']);
    if ($pass){
        $_SESSION['user_id'] = $user['id'];
        header('location: ../Profile.php');
    }else{
//        $_SESSION['error'] = "ERROR";
        $_SESSION['error'] = "Login or Password does not match";
    }
}else{
    $_SESSION['error'] = "Login or Password does not match";
}
}
if (isset($_SESSION['error'])){
    header("location:login.php");
}

?>

