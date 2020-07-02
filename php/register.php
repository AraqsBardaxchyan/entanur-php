<?php
$errors = array();
if(isset ($_POST['login'])){
	$username = preg_replace('/[^A-Za-z]/', '', $_POST['username']);
	$email = $_POST['email'];
	$password = $_POST['email'];
	$c_password = $_POST['c_password'];

	if(file_exists('users/' . $username . '.xml')){
		$errors[] = 'username errors';
	}

	if ($username == ''){
		$errors[] = 'Username is blank';
	}

	if($email == '') {
		$errors[] = 'Email is blank';

	}

	if($password == '' || $c_password == ''){
		$errors[] = 'password are blank';
	}

	if($password != $c_password){
		$errors[] = 'password do not';
	}

	if (count($errors) == 0){
		$xml = new SimpleXNLement('<user></user>');
		$xml ->addChild('password',md5(password));
		$xml ->addChild('email',$email);
		$xml ->asXML('users/' . $username . '.xml');
		header('location: login.php');
		die;

}

	

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>register</title>
</head>
<body>
	<h1>register</h1>
	<form method="post" action="">
		<?php
		if(count($errors) > 0) {
			echo '<ul>';
			foreach ($errors as $e) {
				echo '<li>' . $e . '</li>';

			}
			echo '</ul>';
		}
		?>
		<p>Userame <input type="text" name="username" size="20"</p>
		<p>Email <input type="text" name="Email" size="20"</p>
		<p>Password <input type="text" name="password" size="20"</p>
		<p>Confim Password <input type="text" name="Confim Password" size="20"</p>
		<p><input type="submit" name="login" value="login"></p>
	</form>
</body>
</html>