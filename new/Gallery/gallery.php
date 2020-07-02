<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body id="important">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="navbar-brand" href="../JSON/profile.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../Login/logout.php">Logout</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="gallery.php">Gallery</a>
            </li>
        </ul>
    </nav>
<div class="container">
    <div class="row">
        <form class="w-100 p-0 bg-transparent" action="gallery_process.php" method="post" enctype="multipart/form-data">
            <div class="col-sm-2 offset-sm-4 px-1">
                <label for="gallery" class="btn btn-warning w-100">Choose</label>
                <input id="gallery" type="file" hidden name="upload[]" multiple>
                <script language="JavaScript" >
                  $(document).ready(function(){
                     $(".btn-success").on('click',function(){
                         Swal.fire({
                          position: 'top-end',
                          icon: 'success',
                          title: 'Your work has been saved',
                          showConfirmButton: false,
                          timer: 1500
})
                     })
                         })
                </script>
            </div>
            <div class="col-sm-2 px-1">
                <button name="upload" class="btn btn-success w-100">Upload</button>
            </div>
        </form>
    </div>
    <div class="row dasaran  mt-5">
<?php
$myFile ='gallery.json';
$jsondata = file_get_contents($myFile);
$arr_data = json_decode($jsondata, true);
if(count($arr_data )>0){
foreach ($arr_data as $key => $val) {
$_SESSION['image_name'] = $val['image_name'];
$_SESSION['user_id'] = $val['user_id'];
?>
            <div class="col-sm-2 cursor-pointer mt-2" >
                <a href="#" id="delete" class="position-absolute right-0 text-danger delete" data-index="<?=$_SESSION['user_id']?>">&times</a>
                <img src="images/<?=$_SESSION['image_name']?>" class="img-fluid for-id " data-index="<?=$_SESSION['image_name']?>">
            </div>
<?php
} 
}       
?>
</div>
<script src="../assets/js/script.js"></script>
<script src="../assets/js/jquery-3.4.1.min.js"></script>
</body>
</html>

