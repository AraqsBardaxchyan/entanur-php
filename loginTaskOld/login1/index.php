<?php
session_start();
include "layout/header.php"
?>
<div class="fluid">
	<div class="header">
		<h2>Register<h2>
	</div>
	<form method="post" action="registr/regist_proccess.php" >
		<div class="input-group">
			<label><p>Name</p></label>
			<input type="text" name="name"  placeholder="name" value="<?=$_SESSION['name'] ?>">
            <span class="color"><?=$_SESSION['register']['name-error'] ?></span>
            <?php unset($_SESSION['register']['name-error']) ?>
		</div>
        <div class="input-group">
            <label><p>Lastname</p></label>
            <input type="text" name="lastname"  placeholder="lastname">
            <span class="color"><?=$_SESSION['register']['lastname-error'] ?></span>
            <?php unset($_SESSION['register']['lastname-error']) ?>
        </div>
		<div class="input-group">
			<label><p>Email</p></label>
			<input id="email" type="text" name="email" placeholder="email">
            <span id="error" class="color text-danger"><?=$_SESSION['register']['email-error'] ?></span>
            <?php unset($_SESSION['register']['email-error']) ?>
		</div>
		<div class="input-group">
			<label><p>Password</p></label>
			<input type="password" name="password" placeholder=" password">
            <span class="color"><?=$_SESSION['register']['password-error'] ?></span>
            <?php unset($_SESSION['register']['password-error']) ?>
		</div>
		<div class="input-group">
			<label><p>Confirm</p></label>
			<input type="password" name="confirm" placeholder="confirm password">
            <span class="color"><?=$_SESSION['register']['confirm-error'] ?></span>
            <?php unset($_SESSION['register']['confirm-error']) ?>
		</div>
        <div class="input-group">
            <label><p>Birthday</p></label>
            <input type="date" name="birthday" placeholder="birthday">
            <span class="color"><?=$_SESSION['register']['birthday-error'] ?></span>
            <?php unset($_SESSION['register']['birthday-error']) ?>
        </div>
        <div class="">
            <label>Male</label>
            <input type="radio" name="gender" value="male" placeholder="gender">
            <label>Female</label>
            <input type="radio" name="gender" value="female" placeholder="gender">
            <span class="color"><?=$_SESSION['register']['gender-error'] ?></span>
            <?php unset($_SESSION['register']['gender-error']) ?>

        </div>
		<div class="input-group">
			<button type="submit" name="register" class="btn">Register</button>
		</div>
		<p>
			Already a member?<a href="login/login.php">Sign in</a>
		</p>

	</form>

</div>
<?php
include "layout/footer.php";