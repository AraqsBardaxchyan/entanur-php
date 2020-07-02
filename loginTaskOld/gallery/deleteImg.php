<?php
include "../config/connect.php";
if (isset($_POST['id'])) {
    $img_id = $_POST['id'];
    $select = mysqli_query($connect,"SELECT * FROM `gallery` WHERE `id`='$img_id'");
    $data = mysqli_fetch_assoc($select);
    $image_name = $data['img_name'];
    unlink("../assets/gallery/".$image_name);
    $delete = mysqli_query($connect,"DELETE FROM `gallery` WHERE `id`='$img_id'");
    if ($delete){
        $arr = [
            'success' => 'Deleted',
            'id' => $img_id
        ];
    }
}

echo json_encode($arr);