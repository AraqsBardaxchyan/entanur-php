<?php
session_start();
$id = $_SESSION['user_id'];
session_destroy();
header('location:Login/login.php');
?>


