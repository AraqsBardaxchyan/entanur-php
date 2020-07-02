<?php
//session_start();
include "layout/header.php";
include "config/connect.php";
$id = $_SESSION['user_id'];
//$select = "SELECT * FROM `users` WHERE `id` = '$id'";
$query = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '$id'");
$data = mysqli_fetch_assoc($query);
//var_dump($data);
//uniqid()
?>
<div class="container-fluid">
    <div class="container">

        <div class="row">
            <div class="col-sm-4">

                <form class="w-100 h-80 mb-5" action="upload/upload.php" method="post" enctype="multipart/form-data">
                    <img src="<?php
                    if (file_exists('assets/images/' . $data['avatar'])){
                        echo "assets/images/".$data['avatar'];
                    }elseif ($data['gender'] == 'male'){
                        echo "assets/images/male.jpg";
                    }else {
                        echo "assets/images/female.png";
                    }
                    ?>" class="w-100" alt="">
                    <input type="hidden" value="<?=$data['avatar']?>" name="old_avatar">

                </form>
                <input type="file" hidden id="file" name="file">
                <label for="file" class="btn btn-success mb-0">
                    Choose
                </label>
                <input type="submit" name="upload" class="btn btn-info" >
            </div>



            <div class="col-sm-8">
                <p style="font-style: italic">Full Name`</p>
                <span class="info" style="font-size: 25px;color: lightseagreen"><?=$data['name']?></span>
                <span class="info" style="font-size: 25px;color: lightseagreen"><?=$data['lastname']?></span>
                <p class="mt-3" style="font-style: italic">Email`</p>
                <p class="info" style="font-size: 25px;color: lightseagreen"><?=$data['email'] ?></p>
                <p class="mt-3" style="font-style: italic">Birthday`</p>
                <p class="info" style="font-size: 15px;color: lightseagreen"><?=$data['birthday'] ?></p>
                <p class="mt-3" style="font-style: italic">Gender`</p>
                <p class="info" style="font-size: 15px;color: lightseagreen"><?=$data['gender'] ?></p>
                <p class="mt-3" style="font-style: italic">Created at`</p>
                <p class="info" style="font-size: 15px;color: lightseagreen"><?=$data['created_at'] ?></p>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-sm-12">
            <!-- Trigger the modal with a button -->
            <button id="edit_btn" type="button" class="btn btn-info btn-lg" style="height: 40px; margin-top: 30px;" data-toggle="modal" data-target="#myModal">Edit Info</button>
            <input type="hidden" name="id" value="<?=$id?>">

            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <form action="/editProcess.php" method="post" class="w-100">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Your Personal Information</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p>Name</p>
                            <input type="text" class="w-75 m-3" name="name" value="<?=$data['name']?>">
                            <p>Lastname</p>
                            <input type="text" class="w-75 m-3" name="lastname" value="<?=$data['lastname']?>">
                            <p>Email</p>
                            <input type="email" class="w-75 m-3" name="email" value="<?=$data['email']?>">
                            <p>Birthday</p>
                            <input type="date" class="w-75 m-3" name="birthday" value="<?=$data['birthday']?>">
                            <p>Gender</p>
                            <label>Male</label>
                            <input id="male" type="radio" name="gender" value="<?=$data['gender']?>" >
                            <label>Female</label>
                            <input id="female" type="radio" name="gender" value="<?=$data['gender']?>" >


                        </div>
                        <div class="modal-footer">
                            <input name="edit" type="submit" class="btn btn-default">
                        </div>
                        </form>
                    </div>

                </div>
            </div>
                </div>
                <div class="row">
                    <a href="post.php"><button class="btn btn-info btn-lg mt-2 " style="height: 40px; margin-top: 30px;" type="button">Post Anything!</button></a>
                </div>

            </div>
                <div class="row">
                <div class="col-sm-2">
                    <button type="button" class="btn btn-info btn-lg" style="height: 40px; margin-top: 30px;" data-toggle="modal" data-target="#myModal1">Change Password</button>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal1" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Change Password</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="w-100" action="changePassword.php" method="post">
                                            <div class="form-group">
                                                <input name="old" type="password" placeholder="Old Password" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <input name="new" type="password" placeholder="New Password" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <input name="confirm" type="password" placeholder="Confirm Password" class="form-control">
                                            </div>

                                    </div>
                                    <div class="modal-footer">
                                        <input name="change" type="submit" class="btn btn-default">
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                </div>
        </div>
    </div>
</div>



<?php
include "layout/footer.php";
?>
