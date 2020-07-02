<?php
session_start();
$myFileJ = '../JSON/users.json';
$target_dir = '../assets/profile_images/';
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
    if (file_exists('../assets/profile_images/'.$old_avatar)){
        unlink('../assets/profile_images/'.$old_avatar);
    }
}
if ($uploadOk == 0){
    echo "Sorry, your file was not uploaded";
}else {
    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
        if (file_exists($myFileJ)) {
            $jsonString = file_get_contents($myFileJ);
            $jsonData = json_decode($jsonString, true);
        }
        foreach ($jsonData as & $data) {
            if ($_SESSION['user']['id'] != $data['id']) {
                continue;
            }
            $data['avatar'] =  $imageName;
            $_SESSION['user']['avatar'] =  $imageName;
    }
        $jsonString = json_encode($jsonData,JSON_PRETTY_PRINT);
        file_put_contents($myFileJ, $jsonString);
	   header('location: profile.php');die; 
    }else {
        echo "Sorry, there was an error uploading your file";
    }
}