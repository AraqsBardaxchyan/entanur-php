<?php
session_start();
$meifilex = "../users/users.xml";
 $mailfilej = "../users/users.json";


    if (isset ($_POST['register'])){
    $_SESSION['register'] = array();
    $error = array();
    $username = preg_replace('/[^a-zA-Z0-9]/','',$_POST['username']);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    $basa = $_POST['radiobatton'];
    }
    /*if (file_exists('../users/users.xml')){
       $_SESSION['register']['username-error'] ='Username already exists';
    }*/
    if($username == ''){
       $error['username'] ='Username field is required'; 
        //$_SESSION['register']['username-error'] = "Invalid E-mail address";
    }
    if($email == ''){
       $error['email'] ='Email field is required'; 
       //$_SESSION['register']['email-error'] = "Invalid E-mail address"
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //$_SESSION['register']['email-error'] = "Invalid E-mail address";
         $error['email'] ='Email field is required'; 
    }
    if($password == ''){
       //$_SESSION['register']['password-error'] ='Password field is required'; 
         $error['password'] ='Email field is required'; 
    }
    if($password != $c_password){
       //$_SESSION['register']['c_password-error'] ='Passwords dont match'; 
        $error['c_password'] ='Email field is required'; 

    }
    if($error){
        $_SESSION['register'] = $error; 
        header('location:../index.php?'.json_encode($_SESSION['register']));
        die;          
    } 
    if($basa == 'xmlbase'){
         
            $xml = new SimpleXMLElement('<user></user>');
            $xml->addChild('avatar','avatar');
            $xml->addChild('password', md5($password));
            $xml->addChild('email',$email);
            $xml->asXML(__DIR__.'/../users/username.xml');
            header("Location:../Login/login.php"); 
            die;
        
}

?>