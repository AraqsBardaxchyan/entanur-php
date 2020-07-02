<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$myFile = "../JSON/users.json";
$myFileX = "../XML/users.xml";
if(isset($_POST['login'])){
$jsondata = file_get_contents($myFile);
$arr_data = json_decode($jsondata, true);  
foreach ($arr_data as $data){
    if ($username == $data['username']) {
            if (md5($password) == $data['password']){
                $_SESSION['user'] = $data;
                header('location: ../JSON/profile.php');die;
            }    
    }   
}   
$xmldata = file_get_contents($myFileX);
$objects = simplexml_load_string($xmldata);
$json = json_encode($objects);
$xdata = json_decode($json, true);   
$arrx_data = $xdata['user']; 
if(is_array($arrx_data)){    
foreach ($arrx_data as $xmdata){
    if ($username == $xmdata['username']) {
            if (md5($password) == $xmdata['password']){
                $_SESSION['user'] = $xmdata;
                header('location: ../XML/profile.php');die;
            }    
    }   
}
    }
$_SESSION['login']['login-error']='Invalid username and/or password';
header('location: login.php');die;
}
