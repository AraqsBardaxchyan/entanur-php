<?php
session_start();
if (isset ($_POST['register'])){
    $username = preg_replace('/[^a-zA-Z0-9]/','',$_POST['username']);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    if (file_exists('users/'.$username.'.xml')){
    $_SESSION['register']['username-error'] ='Username already exists';
    }
    if($username == ''){
       $_SESSION['register']['username-error1'] ='Username field is required'; 
    }
    if($email == ''){
       $_SESSION['register']['email-error'] ='Email field is required'; 
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['register']['email-error'] = "Invalid E-mail address";
    }
    if($password == ''){
       $_SESSION['register']['password-error'] ='Password field is required'; 
    }
    if($password != $c_password){
       $_SESSION['register']['confirm-error'] ='Passwords dont match'; 
    }
    if($_SESSION['register']){
        header('location:index.php');die;          
    }else{
        $xml = new SimpleXMLElement('<user></user>');
        $xml->addChild('avatar','avatar');
        $xml->addChild('password', md5($password));
        $xml->addChild('email',$email);
        $xml->asXML('users/'. $username .'.xml');
        header('Location: login.php'); 
        die;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
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
                <a class="nav-link" href="login.php">Login</a>
            </li>
        </ul>
    </nav>
<div class="fluid">
	<div class="header">
        <h2>Register</h2>
	</div>
	<form  method="post" action="" >
		<div class="input-group">
			<label><p>Userame</p></label>
			<input type="text" name="username"  placeholder="username">
            <span id="error" class="color text-danger"><?=$_SESSION['register']['username-error'] ?></span>
            <span id="error" class="color text-danger"><?=$_SESSION['register']['username-error1'] ?></span>
            <?php unset($_SESSION['register']['username-error']) ?>
            <?php unset($_SESSION['register']['username-error1']) ?>
		</div>
		<div class="input-group">
			<label><p>Email</p></label>
			<input id="email" type="text" name="email" placeholder="email">
            <span id="error" class="color text-danger"><?=$_SESSION['register']['email-error'] ?></span>
            <?php unset($_SESSION['register']['email-error']) ?>
		</div>
		<div class="input-group">
			<label><p>Password</p></label>
			<input type="password" name="password" placeholder=" password">
            <span class="color"><?=$_SESSION['register']['password-error'] ?></span>
            <?php unset($_SESSION['register']['password-error']) ?>
		</div>
		<div class="input-group">
			<label><p>Confirm</p></label>
			<input type="password" name="c_password" placeholder="confirm password">
            <span class="color"><?=$_SESSION['register']['confirm-error'] ?></span>
            <?php unset($_SESSION['register']['confirm-error']) ?>
		</div>
		<div class="input-group">
			<button type="submit" value="register" name="register" class="btn btn-light">Register</button>
		</div>
		<p>
			Already a member?<a href="login.php">Sign in</a>
		</p>

	</form>

</div>
<script src="../assets/js/script.js"></script>
</body>
</html>

