
<?php
 //session_start();
    if (isset ($_POST['register'])){
    $username = preg_replace('/[^a-zA-Z0-9]/','',$_POST['username']);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    $_SESSION['register'] = 0; 
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
    //
    if($_SESSION['register']){
        header('location:logoin.php');die;          
    }else{
        $xml = new SimpleXMLElement('<user></user>');
        $xml->addChild('avatar','avatar');
        $xml->addChild('password', md5($password));
        $xml->addChild('email',$email);
        $xml->asXML('users/'. $username .'.xml');
        header('Location: index.php'); 
        die;
    }
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
        </li>
    </ul>
</nav>   
<form method="post" action="" >

  <div classv = "container">
<div class = "row">
<div class= "col-md-8">
    <h1 class = "text-center">Registr</h1>
<div class="row">
    <label class="label col-md-3 control-label"> name</label>
<div class="col-md-9">
    <input type="text" class="form-control" name="name" placeholder="lastname">
</div>
</div>
<div class="row">
    <label class="label col-md-3 control-label">Email</label>
<div class="col-md-9">
    <input type="text" class="form-control" name="Email" placeholder="Email">
</div>           
</div>
<div class="row">
    <label class="label col-md-3 control-label">password</label>
<div class="col-md-9">
    <input type="text" class="form-control" name="password" placeholder="password">
</div> 
</div>
<div class="row">
    <label class="label col-md-3 control-label">Confirm</label>
<div class="col-md-9">
    <input type="text" class="form-control" name="Confirm" placeholder="Confirm">
</div> 
</div>
</div>
<div class="col-md-4"></div>
<div class="input-group">
    <button type="submit" name="register" class="btn">Register</button>
</div>
<p>
    Already a member?<a href="login.php">Sign in</a>
</p>

</div>
    </div>
    </form>
    <script src="../assets/js/script.js"></script>
</body>
</html>