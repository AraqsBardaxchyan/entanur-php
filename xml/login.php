
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
                <a class="nav-link" href="index.php">Register</a>
            </li>
        </ul>
    </nav>
  
    <form method="post" action="" >
       <div class="fluid">
       <div classv = "container">
        <div class = "row">
            <div class= "col-md-8">
                <h1 class = "text-center">Login</h1>
                <div class="row">
                    <label class="label col-md-3 control-label">Your name</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="name" placeholder="full name">
                    </div>
                </div>
                <div class="row">
                    <label class="label col-md-3 control-label">password</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="password" placeholder="password">
                    </div> 
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="input-group">
            <button type="submit" name="Login" class="btn">Login</button>
        </div>
        </div>
    </div>
    <p>
        Not yet a member?<a href="index.php">Sign up</a>
    </p>
    </form>
    <script src="../assets/js/script.js"></script>
</body>
</html>

<?php

