<?php
session_start();
include "../config/connect.php";
if (isset($_POST['register'])) {
    if (isset($_POST['name']) && !empty($_POST['name'])) {
        $name = $_POST['name'];
        $_SESSION['name'] = $name;
    } else {
        $_SESSION['register']['name-error'] = "Name field is required";
    }

    if (isset($_POST['lastname']) && !empty($_POST['lastname'])) {
        $lastname = $_POST['lastname'];
    } else {
        $_SESSION['register']['lastname-error'] = "Lastname field is required";
    }

    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['register']['email-error'] = "Invalid E-mail address";
        }

    } else {
        $_SESSION['register']['email-error'] = "Email field is required";
    }

    if (isset($_POST['password']) && !empty($_POST['password'])) {
        $password = $_POST['password'];
    } else {
        $_SESSION['register']['password-error'] = "Password field is required";
    }

    if (isset($_POST['confirm']) && !empty($_POST['confirm'])) {
        $conf_pass = $_POST['confirm'];
    } else {
        $_SESSION['register']['confirm-error'] = "Confirm field is required";
    }

    if (isset($_POST['birthday']) && !empty($_POST['birthday'])) {
        $birthday = $_POST['birthday'];
    } else {
        $_SESSION['register']['birthday-error'] = "Birthday field is required";
    }

    if (isset($_POST['gender']) && !empty($_POST['gender'])) {
        $gender = $_POST['gender'];
    } else {
        $_SESSION['register']['gender-error'] = "Gender field is required";
    }
    if ($_SESSION['register']) {
        header('location:../index.php');die;
    } else {

    if ($password == $conf_pass) {
        $avatar = ($gender == 'male') ? "male.jpg" : "female.jpg";
        $password = crypt($password);
        $insert = mysqli_query($connect, "INSERT INTO `users` (`name`, `lastname`, `email`,  `password`, `birthday`, `gender`, `avatar`) VALUES ('$name', '$lastname', '$email', '$password', '$birthday', '$gender', '$avatar')");
        if ($insert) {
            header("location:../login/login.php");
        } else {
            $_SESSION['smt'] = "Something went wrong";
        }
    } else {
        header("location:../index.php");
        $_SESSION['register']['confirm-error'] = "Passwords dont match";
    }

}

}