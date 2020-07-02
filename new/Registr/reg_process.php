<?php
session_start();
$myFile = "../JSON/users.json";
$myFileX = "../XML/users.xml";
$arr_data = array();
$password = $_POST['password'];
$username = $_POST['username'];
$email = $_POST['email'];
$base = $_POST['base'];
$c_password = $_POST['c_password'];
$string = file_get_contents($myFile);
$json_a = json_decode($string,true);
if (isset ($_POST['register'])){
    if($username == ''){
       $_SESSION['register']['firstname-error'] ='Firstname field is required'; 
    }
    if($username == ''){
       $_SESSION['register']['lastname-error'] ='Lastname field is required'; 
    }
    if($username == ''){
       $_SESSION['register']['username-error1'] ='Username field is required'; 
    }
    foreach ($json_a as $emp) {
    $user = $emp['username'];
    if($username == $user){
       $_SESSION['register']['username-error'] ='Username already exist'; 
    }
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
        header('location:../index.php');die;
    }
if($base == 'jsonbase'){
	   $jsondata = file_get_contents($myFile);
	   $arr_data = json_decode($jsondata, true);
    $id = count($arr_data) + 1;
	   $formdata = array(
	      'id' => $id,
           'firstname'=> $_POST['firstname'],
           'lastname'=> $_POST['lastname'],
           'username'=> $_POST['username'],
	      'email'=> $_POST['email'],
	      'password'=>md5($_POST['password']),
           'avatar' => 'sample.png'  
	   );
	   $arr_data = array();
	   $jsondata = file_get_contents($myFile);
	   $arr_data = json_decode($jsondata, true);
	   array_push($arr_data,$formdata);
	   $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
	   if(file_put_contents($myFile, $jsondata)) {
	   header('Location: ../Login/login.php');
        die;
	    }
	   else 
	        echo "error";
   }
    if($base == 'xmlbase'){
        $xmlString = file_get_contents($myFileX);
        $objects = simplexml_load_string($xmlString);
        $json = json_encode($objects);
        $data = json_decode($json, true);
        $xmlData = $data['user'];
        $id = count($xmlData) + 1;
        $xml = new DOMDocument("1.0","UTF-8");
        $xml->load($myFileX);
        $rootTag = $xml->getElementsByTagName("users")->item(0);
        $dataTag = $xml->createElement("user");
        $idTag = $xml->createElement("id",$id);
        $fTag = $xml->createElement("firstname",$_POST['firstname']);
        $lTag = $xml->createElement("lastname",$_POST['lastname']);
        $uTag = $xml->createElement("username",$_POST['username']);
        $eTag = $xml->createElement("email",$_POST['email']);
        $pTag = $xml->createElement("password",md5($_POST['password']));
        $aTag = $xml->createElement("avatar",'sample.png');
        $dataTag->appendChild($idTag);
        $dataTag->appendChild($fTag);
        $dataTag->appendChild($lTag);
        $dataTag->appendChild($uTag);
        $dataTag->appendChild($eTag);
        $dataTag->appendChild($pTag);
        $dataTag->appendChild($aTag);
        $rootTag->appendChild($dataTag);
        $xml->save($myFileX);
        header('Location: ../Login/login.php');
        die;
    }
}
?>