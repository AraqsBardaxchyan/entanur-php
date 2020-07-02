<?php
session_start();
$error = false; 
if(isset($_POST['login'])){
    $username = preg_replace('/[^a-zA-Z0-9]/','',$_POST['username']);
    $password = md5($_POST['password']);
    if (file_exists('users/'.$username.'.xml')){
        $xml = new SimpleXMLElement('users/'.$username.'.xml',0,true);
        if($password == $xml->password){
        $_SESSION['username'] = $username; 
        header('location: profile.php');
        die;
        }
    }
   $error = true; 
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<!--    <script src="../assets/js/sweetalert2.all.min.js"></script>-->
<!--    <script src="sweetalert2.min.js"></script>-->
<!--    <link rel="stylesheet" href="sweetalert2.min.css">-->
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Register</a>
            </li>
        </ul>
    </nav>
<div class="header">
    <h2>Login<h2>
</div>
<form method="post" action="" >
    <div class="input-group">
        <label>Username</label>
        <input type="username" name="username">
    </div>
    <div class="input-group">
        <label>Password</label>
        <input type="password" name="password">
        <?php
        if($error){
        echo '<p class="color text-danger">Invalid username and/or password</p>';
        }
        ?>
    </div>
    <div class="input-group">
        <button type="submit" name="login" class="btn btn-light">Login</button>
    </div>
    <p>
        Not yet a member?<a href="index.php">Sign up</a>
    </p>
</form>
<script src="../assets/js/script.js"></script>
</body>
</html>