
<?php
session_start();
include "layout/header.php"
?>
<?php unset($_SESSION['error'])?>
    <form method="post" action="" >
        <div class = "container">
            <div class = "row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="row" style = "margin-top:120px; box-shadow:-1px 1px 50px 10px black;">
                        <div class="col-md-10">
                        	<form method="post" action="" >
                            	<div> <h1 class="log"> login</h1></div>
                            	<div> 
                                    <label class="label control-label">Username</label>
                                    <input type="username" class ="form-control" name="username" placeholder="Username">
                                </div>
                                <div>
                            	   <label class="label control-label">Password</label>
                                   <input type="password" class ="form-control" name="password" placeholder="password">  
                                </div>
                            	<div>           
                            	   <input type="checkbox"><small>Remember me ?</small>
                            	   <div><button class="btn btn-info" type="submit" value="login" name="login" class="btn btn-light">Login</button></div>
                                </div>
                            	<div><a class="text-center href-sign"  href="#">Forgot your account?</p></div>
                            	<div><a class="text-center href-sign"  href="../index.php">Sign in</p></div>

                        	</form>
                        </div>
                        
                    </div>

                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </form>
</section>
<script src="../assets/js/script.js"></script>
<?php
include "../layout/footer.php"
?>
</body>
</html>