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
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="Login/login.php">Login</a>
            </li>
        </ul>
    </nav>
<div class="fluid">
	<div class="header">
        <h2>Register</h2>
	</div>
	<form  method="post" action="Registr/reg_process.php" >
        <div class="input-group">
			<label><p>Firstname</p></label>
			<input id="email" type="text" name="firstname" placeholder="firstname">
            <span id="error" class="color text-danger"><?=$_SESSION['register']['firstname-error'] ?></span>
            <?php unset($_SESSION['register']['firstname-error']) ?>
		</div>
        <div class="input-group">
			<label><p>Lastname</p></label>
			<input id="email" type="text" name="lastname" placeholder="lastname">
            <span id="error" class="color text-danger"><?=$_SESSION['register']['lastname-error'] ?></span>
            <?php unset($_SESSION['register']['lastname-error']) ?>
		</div>
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
        <div>
              <label>xml base</label>
            <input type="radio" name="base" value="xmlbase" placeholder="gender" checked>
            <label>json base</label>
            <input type="radio" name="base" value="jsonbase" placeholder="gender">
        </div>
		<div class="input-group">
			<button type="submit" value="register" name="register" class="btn btn-light">Register</button>
		</div>
		<p>
			Already a member?<a href="Login/login.php">Sign in</a>
		</p>
	</form>
</div>
<script src="../assets/js/script.js"></script>
</body>
</html>

