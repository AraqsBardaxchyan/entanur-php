<?php
include "../config/connect.php";

$select = mysqli_query($connect, "SELECT `name`, `lastname` FROM `users`");
$arr = [];
while ($data = mysqli_fetch_assoc($select)) {
    $fullName = $data['name'];
    $arr[] = $fullName;
}

echo json_encode($arr);