<?php
	$username ="";
	$email="";
	$errors = array ();
$db = mysqli_connect('localhost','root','','registrationn');
 //btn cliki jamanak
if(isset($_POST['regiser'])){
	$username = mysqli_real_escape_string($_POST['username']);
	$email = mysqli_real_escape_string($_POST['email']);
	$password_1 = mysqli_real_escape_string($_POST['password_1']);
	$password_2 = mysqli_real_escape_string($_POST['password_2']);


	if(empty($username)){
		array_push($errors "Username is required");
	}

	if(empty($email){
		array_push($errors email is required");
	}
	if(empty($username)){
		array_push($errors "Username is required") email