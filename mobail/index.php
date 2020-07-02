<?php
session_start();
include "layout/header.php";       
$erros = $_SESSION['register']; 
?>
<section class="regist_img">  
    <form method="post" action="register/regis_proccess.php">
        <div class = "container">
            <div class = "row">
                <div class="col-md-2"></div>
                    <div class="col-md-8">
                    <div class="row" style = "margin-top:120px; box-shadow:-1px 1px 50px 10px black;">
                        <div class="col-md-10">
                            <form method="post" action="" >
                                <div> <h1 class="log"> Registracia</h1></div>
                                <div>
                                    <label class="label control-label">Username</label>
                                    <input type="username" class ="form-control" name="username" placeholder="Username">                                
                                    <span class="color"><?=$_SESSION['username']['username']?></span>                                
                                </div>
                                <div>
                                    <label class="label control-label">Email</label>
                                    <input id="email" type="email" class ="form-control" name="email" placeholder="Email...">
                                    <span class="color"><?=$_SESSION['email']['name-error'] ?></span>                                
                                </div>
                                <div> 
                                    <label class="label control-label">Password</label>
                                    <input type="password" class ="form-control"name="password" placeholder="password">
                                    <span class="color"><?=$_SESSION['password']['name-error'] ?></span>  
                                </div>
                                <div>
                                    <label class="label control-label">Confirm</label>
                                    <input type="password" class ="form-control"name="c_password" placeholder="Confirm password">
                                    <span class="color"><?=$_SESSION['c_password']['name-error'] ?></span>     
                                </div>
                                <input type="radio" name="radiobatton" value="xmlbase"><small>xml?</small>
                                <input type="radio" name="radiobatton" value="jsonbase"><small>json?</small>
                                <div>
                                    <div><button class="btn btn-info" type="submit" value="register" name="register" class="btn btn-light">Register</button></div>
                                </div>
                                <div><a class="text-center href-sign"  href="#">Forgot your account?</p></div>
                                <div><a class="text-center href-sign"  href="login/login.php">Sign in</p></div> 
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
$_SESSION['register'] = array();
include "layout/footer.php"; 

?>
