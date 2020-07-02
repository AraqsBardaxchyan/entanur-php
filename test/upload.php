<?php
session_start();

$id = $_SESSION['user_id'];
$target_dir = 'assets/images/';
$imageName = uniqid(). basename($_FILES['file']['name']);
$target_file = $target_dir . $imageName;
$old_avatar = $_POST['old_avatar'];
$uploadOk = 1;

$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (file_exists($target_file)){
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
if ($_FILES['file']['size'] > 5000000){
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif'){
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed";
    $uploadOk = 0;
}

if ($old_avatar != 'sample.png'){
    if (file_exists('assets/images/'. $old_avatar)){
        unlink('assets/images/'. $old_avatar);
    }
}

if ($uploadOk == 0){
    echo "Sorry, your file was not uploaded";
}else {
    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
        $xml = new SimpleXMLElement('users/'.$_SESSION['username'].'.xml',0,true);
        $xml->avatar = $imageName;
        $xml->asXML('users/'.$_SESSION['username'].'.xml');
        header('location: profile.php'); 
            die;
    }else {
        echo "Sorry, there was an error uploading your file";
    }
}