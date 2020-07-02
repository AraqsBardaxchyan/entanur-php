<?php
session_start();
include "config/connect.php";
$id = $_SESSION['user_id'];
if(isset($_POST['edit'])) {
    foreach ($_POST as $key => $value) {
        $$key = $value;
    }
    $update = "UPDATE `users` SET `name` = '$name',`lastname` = '$lastname',`email` = '$email',`password` = '$password',`birthday` = '$birthday',`gender` = '$gender'  WHERE `id` = '$id'";
    $query = mysqli_query($connect, $update);
    header('location:./Profile.php');
}
include "layout/footer.php";


