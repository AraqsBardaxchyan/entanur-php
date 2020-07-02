<?php
error_reporting(0);

if(count($_POST)>0){

    if($_POST['name']==null){
        $_SESSION['error_name']='Eror name';
    } else if($_POST['Email']){
        $_SESSION ['error_email']='Eror email';
    } else if ($_POST['password']){
        $_SESSION ['error_password']='Eror password';
}

/*if(isset($_POST['login'])){
    /*$username = preg_replace('/[^A-Za-z]/', '', $_POST['username']);
    $email = $_POST['email'];
    //$password = $_POST['password'];
    $password = base_64_encode(md5($_POST['password']));
    $c_password = $_POST['c_password'];*/
    /*$xml = simplexml_load_file($_SERVER["DOCUMENT_ROOT"]."/users.xml");
    $sxe = new SimpleXMLElement($xml->asXML());
    $newItem = $sxe->addChild("url");
    $newItem->addAttribute('id',5); // add this

    $newItem->addChild("username", "test");
    $newItem->addChild("email", '+03:00');
    $newItem->addChild("password", 'weekly');
    $newItem->addChild("c_password", 'weekly');
    $sxe->asXML($_SERVER["DOCUMENT_ROOT"]."/users.xml");*/

//     if (isset($_POST['register'])) {
//     if (isset($_POST['name']) && !empty($_POST['name'])) {
//         $name = $_POST['name'];
//         $_SESSION['name'] = $name;
//     } else {
//         $_SESSION['register']['name-error'] = "Name field is required";
//     }

//     if (isset($_POST['lastname']) && !empty($_POST['lastname'])) {
//         $lastname = $_POST['lastname'];
//     } else {
//         $_SESSION['register']['lastname-error'] = "Lastname field is required";
//     }
    
//     if (isset($_POST['email']) && !empty($_POST['email'])) {
//         $password = $_POST['password'];
//     } else {
//         $_SESSION['register']['email-error'] = "email field is required";
//     }
//     if (isset($_POST['password']) && !empty($_POST['password'])) {
//         $password = $_POST['password'];
//     } else {
//         $_SESSION['register']['password-error'] = "Password field is required";
//     }

//     if (isset($_POST['confirm']) && !empty($_POST['confirm'])) {
//         $conf_pass = $_POST['confirm'];
//     } else {
//         $_SESSION['register']['confirm-error'] = "Confirm field is required";
//     } else {
//         $xml = simplexml_load_file($_SERVER["DOCUMENT_ROOT"]."/users.xml");
//     $sxe = new SimpleXMLElement($xml->asXML());
//     $newItem = $sxe->addChild("url");
//     $newItem->addAttribute('id',5); // add this

//     $newItem->addChild("username", "test");
//     $newItem->addChild("email", '+03:00');
//     $newItem->addChild("password", 'weekly');
//     $newItem->addChild("c_password", 'weekly');
//     $sxe->asXML($_SERVER["DOCUMENT_ROOT"]."/users.xml");
// }

    /*if(file_exists('users/' . $username . '.xml'))
        {
        $errors[] = 'Username already exists';
        }
    if($username == '')
        {
        $errors[] = 'Username is blank';
        }
    if($email == ''){
        $errors[] = 'Email is blank';
    }
    if($password == '' || $c_password == ''){
        $errors[] = 'Passwords are blank';
    }
    if($password != $c_password){
        $errors[] = 'Passwords do not match';
    }

    if(count($errors) == 0) {
        //$xml =  new simpleXMLElement('<user><user>');
        //$xml ->addChild('password', md5($password));
        //$xml ->addChild('email',$email);
        //$xml->asXML('users/'. $username .'.xml');
        header('Location: login.php'); 
        die;

    }*/
    


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
<?php
if (count($errors) > 0) {
    echo '<ul>';
    foreach ($errors as $e) {
        echo '<li>' . $e . '</li>';                     
        echo '</ul>';
         }
    }
?>
  <div classv = "container">
<div class = "row">
<div class= "col-md-8">
    <h1 class = "text-center">Registr</h1>
<div class="row">
    <label class="label col-md-3 control-label">Your name</label>
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
    Already a member?<a href="login/login.php">Sign in</a>
</p>

</div>
    </div>
    </form>
    <script src="../assets/js/script.js"></script>
</body>
</html>