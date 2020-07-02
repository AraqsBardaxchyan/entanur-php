<? php 
include('server.php');
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
	<div class="header">
		<h2>Regiser<h2>
	</div>
	<form method="post" action="index.php" >
		<div class="input-group">
			<label><p>Username</p></label>
			<input type="text" name="username"  placeholder="username">
		</div>
		<div class="input-group">
			<label><p>Email</p></label>
			<input type="text" name="email" placeholder="email">
		</div>
		<div class="input-group">
			<label><p>Password</p></label>
			<input type="password" name="password_1" placeholder="password">
		</div>
		<div class="input-group">
			<label><p>Username</p></label>
			<input type="passord" name="password_2" placeholder="passord">
		</div>
		<div class="input-group">
			<button type="submit" name="regiser" class="btn">Register</button>
		</div>
		<p>
			Already a member?<a href="login.php">Sign in</a>
		</p>

	</form>

	
<script type="text/javascript"></script>
</body>
</html>