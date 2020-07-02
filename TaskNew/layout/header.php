<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
<!--    <script src="../assets/js/sweetalert2.all.min.js"></script>-->
<!--    <script src="sweetalert2.min.js"></script>-->
<!--    <link rel="stylesheet" href="sweetalert2.min.css">-->
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="../Profile.php">Home</a>

    <!-- Links -->
    <ul class="navbar-nav">
        <?php
            if (isset($_SESSION['user_id'])){
                echo "<li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"../logout.php\">Logout</a>
                        </li>";
                echo "<li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"../gallery/gallery.php\">Gallery</a>
                        </li>";
                echo "<li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"../postpage.php\">Posts</a>
                        </li>";
                echo "<li class=\"nav-item\"> <form class='w-100' action='../search/search.php' method='post'>
<div class='form-group'><input type='text' id='mySearch' name='mysearch' class='form-control' placeholder='search'><button class='btn btn-success' name='submit' type='submit'>Search</button></div></form></li>";
            }else {
                echo "<li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"../login/login.php\">Login</a>
                        </li>";
            }
        ?>

    </ul>
</nav>
