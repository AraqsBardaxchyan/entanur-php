<?php
include "../config/connect.php";
if (isset($_POST['key']) && !empty($_POST['key'])) {
    $email = $_POST['key'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $arr = [
            "email_error" => "Invalid E-mail address",
        ];
    }else {
       $select = mysqli_query($connect,"SELECT * FROM `users` WHERE `email` = '$email'");
       $data = mysqli_num_rows($select);
//       var_dump($data);
       if ($data > 0){
           $arr = [
               "email_error" => "E-mail already exists",
           ];
       }
    }
}else {
    $arr = [
        "email_error" => "E-mail field is empty",
    ];
}

echo json_encode($arr);