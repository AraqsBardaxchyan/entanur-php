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
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="#">Logo</a>

    <!-- Links -->
    <ul class="navbar-nav">
        <?php
            if (isset($_SESSION['user_id'])){
                echo "<li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"../logout.php\">Logout</a>
                        </li>";
            }else {
                echo "<li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"../login/login.php\">Login</a>
                        </li>";
            }
        ?>
<!--        <li class="nav-item">-->
<!--            <a class="nav-link" href="#">Link 2</a>-->
<!--        </li>-->
<!--        <li class="nav-item">-->
<!--            <a class="nav-link" href="#">Link 3</a>-->
<!--        </li>-->
    </ul>
</nav>
