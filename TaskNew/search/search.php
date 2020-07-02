<?php
session_start();

include "../config/connect.php";
//var_dump($_POST);die;
$id = $_SESSION['user_id'];
if (isset($_POST['submit'])) {
    if (!empty($_POST['mysearch'])){
        $name = $_POST['mysearch'];
        $select = mysqli_query($connect, "SELECT * FROM `users` WHERE `name` = '$name'");
        $data = mysqli_fetch_assoc($select);
//        var_dump($data);
        $_SESSION['user_search_id'] = $data['id'];
        if ($data['id'] == $id){
            header("location: ../Profile.php");
        }else {
            $username = $data['lastname'];
        }
    }

}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <a href="../searchpage/userpage.php">
                <?= $name." ".$username ?>
            </a>
        </div>
    </div>
</div>

