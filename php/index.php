<?php
session_start();
if(file_exists('users/' . $_SESSION ['username'] . '.xml')){
	header('Location: login.php');
	die;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>user page</title>
</head>
<body>
<h1>user page</h1>
<h2>welcome,<?php echo $_SESSION['username'];?></h2>
<hr/>
<a href ="logout.php">Logout</a>

</body>
</html>