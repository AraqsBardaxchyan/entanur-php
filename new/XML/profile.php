<?php
session_start();
$myFileX = '../XML/users.xml';
$error = false;
$xml = new SimpleXMLElement($myFileX,0,true);
$error = false;
if(isset ($_POST['change'])){
    $old = md5($_POST['old']);
    $new = md5($_POST['new']);
    $conf = md5($_POST['confirm']);
    $xml = new SimpleXMLElement($myFileX,0,true);
    foreach ($xml as $pass){
    if($old == $pass->password){
        if($new == $conf){
            $pass->password = $new;
            $xml->asXML($myFileX);
            header('location: ../Login/logout.php'); 
            die;
        }
    }     
    $error = true;
        }
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
            <a class="nav-link" href="../Login/logout.php">Logout</a>
        </li>
    </ul>
</nav>
<div class="fluid">
    <div class="header">
        <h1>Profile</h1>
        <h2>Welcome <?php echo  $_SESSION['user']['firstname'], $_SESSION['user']['lastname'];?></h2>
        <form class="w-100 h-80 mb-3" action="upload.php" method="post" enctype="multipart/form-data">
            <img src="<?php
            if (file_exists('../assets/profile_images/'.$_SESSION['user']['avatar'])){
                echo "../assets/profile_images/".$_SESSION['user']['avatar'];
            }else {
                echo "../assets/profile_images/sample.png";
            }
            ?>"class="w-100 pr-image" alt="">
            <input type="hidden" value="<?=$_SESSION['user']['avatar']?>" name="old_avatar">
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
            <button type="button" class="btn btn-danger " data-toggle="modal" data-target="#myModal">Map</button>
        <a class="btn btn-danger " href="../Gallery/xgallery.php" role="button">Galery</a>
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="mapouter"><div class="gmap_canvas"><iframe width="640" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=yerevan&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net">embedgooglemap.net</a></div><style>.mapouter{position:relative;text-align:right;height:350px;width:400px;}.gmap_canvas {overflow:hidden;background:none!important;height:350px;width:498px;}</style></div>
                    </div>
                </div>
            </div>
    </div>
</div>
<script src="../assets/js/script.js"></script>
</body>
</html>