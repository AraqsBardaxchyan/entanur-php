<?php
//session_start();
include "../layout/header.php";

?>
<?php unset($_SESSION['error'])?>
<div class="header">
    <h2>Login<h2>
</div>
<form method="post" action="login_profile.php" >
    <div class="input-group">
        <label>Email</label>
        <input type="email" name="email">
    </div>
    <div class="input-group">
        <label>Password</label>
        <input type="password" name="password">
    </div>
    <div class="input-group">
        <button type="submit" name="login" class="btn">Login</button>
    </div>
    <p>
        Not yet a member?<a href="../index.php">Log In</a>
    </p>

</form>

<?php
include "../layout/footer.php";
