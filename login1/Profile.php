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
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <img src="<?php
                            if (file_exists('assets/images/' . $data['avatar'])){
                                echo "assets/images/".$data['avatar'];
                            }elseif ($data['gender'] == 'male'){
                                echo "assets/images/male.jpg";
                            }else {
                                echo "assets/images/female.png";
                            }
                        ?>" class="w-50" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <form class="w-100" action="upload/upload.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" value="<?=$data['avatar']?>" name="old_avatar">
                            <input type="file" hidden id="file" name="file">
                            <label for="file" class="btn btn-success mt-2">
                               Choose
                            </label>
                            <input type="submit" name="upload" class="btn btn-info">
                        </form>
                    </div>
                </div>
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
