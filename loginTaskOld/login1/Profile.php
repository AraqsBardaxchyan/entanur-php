<?php
session_start();
include "config/connect.php";
include "layout/header.php";
$id = $_SESSION['user_id'];
$select = "SELECT * FROM `users` WHERE `id` = '$id'";
$query = mysqli_query($connect, $select);
$data = mysqli_fetch_assoc($query);
//var_dump($data);
uniqid()
?>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <img src="assets/images/<?=$data['avatar'] ?>" class="img-fluid" alt="">
            </div>
            <div class="col-sm-3">
                <span><?=$data['name']?></span>
                <span><?=$data['lastname']?></span>
            </div>
        </div>
    </div>
</div>


<?php
include "layout/footer.php";
?>
