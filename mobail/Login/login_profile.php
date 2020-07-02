<?php
session_start();
//include '../users/username.xml';
//include '../users/users.json';


/*error = false;
if(isset($_POST['login'])){
	$username = preg_replace('/[^A-Za-z]/', '', $_POST['username']);
	$password = md5($_POST['password']);
	if(file_exists('users/' . $username . '.xml')){
		$xml = new SimpleXMLElement('users/' . $username . '.xml', 0, true);
		if($password == $xml->password){

			$_SESSION['username'] = $username;
			header('Location:../profile.php');
			die;
		}
	}
	$error = true;
}*/




$username = $_POST['username'];
$password = $_POST['password'];
$myFile = "../users/users.json";
if(isset($_POST['login'])){
$jsondata = file_get_contents($myFile);
$arr_data = json_decode($jsondata, true);  
//foreach ($arr_data as $data){
    //if ($username == $data['username']) {
            if (md5($password) == $data['password']){
                $_SESSION['user'] = $data;
                header('location:login.php');die;
            }    
    //}   
//}
$_SESSION['login']['login-error']='Invalid username and/or password';
header('location: ../profail.php');die;
}
?>