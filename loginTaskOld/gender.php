<?php
include "config/connect.php";
if (isset($_POST['userId'])) {
    $id = $_POST['userId'];
    $select = mysqli_query($connect,"SELECT * FROM `users` WHERE `id` = '$id'");
    $row = mysqli_fetch_assoc($select);
    $gender = $row['gender'];
    $arr = [
        'gender' => $gender
    ];
}

echo json_encode($arr);