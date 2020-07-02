<?php
session_start();
if (!file_exists('users/'.$_SESSION['username'].'.xml')){
   header('location: login.php');   
}
$xml = new SimpleXMLElement('users/'.$_SESSION['username'].'.xml',0,true);
$data = $xml->avatar;
$_SESSION['avatar'] = $data;
$email = $xml->email;
$_SESSION['email'] = $email;
$error = false;
if(isset ($_POST['change'])){
    $old = md5($_POST['old']);
    $new = md5($_POST['new']);
    $conf = md5($_POST['confirm']);
    $xml = new SimpleXMLElement('users/'.$_SESSION['username'].'.xml',0,true);
    if($old == $xml->password){
        if($new == $conf){
            $xml->password = $new;
            $xml->asXML('users/'.$_SESSION['username'].'.xml');
            header('location: logout.php'); 
            die;
        }
    }
    $error = true;
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="navbar-brand" href="profile.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="gallery.php">Gallery</a>
            </li>
        </ul>
    </nav>
<div class="fluid">
	<div class="header">
        <h1>Profile</h1>
        <h2>Welcome <?php echo $_SESSION['username'];?></h2>
        <form class="w-100 h-80 mb-3" action="upload.php" method="post" enctype="multipart/form-data">
                    <img src="<?php
                    if (file_exists('assets/images/' .$_SESSION['avatar'])){
                        echo "assets/images/".$_SESSION['avatar'];
                    }else {
                        echo "assets/images/sample.png";
                    }
                    ?>" class="w-100 pr-image" alt="">
                    <input type="hidden" value="<?=$_SESSION['avatar']?>" name="old_avatar">
                <input type="file" hidden id="file" name="file">
                <label for="file" class="btn btn-success mt-3">
                    Choose
                </label>
                <input type="submit" name="upload" class="btn btn-info mt-3" value="Upload">
                </form>
        <button type="button" class="btn btn-info "  data-toggle="modal" data-target="#myModal1">Change Password</button>
                    <div class="modal fade" id="myModal1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Change Password</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form class="w-100" action="" method="post">
                                        <?php
                                        if($error){
                                            echo '<p class="color text-danger">Some of the passwords do not match</p>';
                                            }
                                        ?>
                                        <div class="form-group">
                                            <input name="old" type="password" placeholder="Old Password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input name="new" type="password" placeholder="New Password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input name="confirm" type="password" placeholder="Confirm New Password" class="form-control">
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
<script src="../assets/js/script.js"></script>
</body>
</html>
