<?php
session_start();
include "layout/header.php";
include "config/connect.php";
$id = $_SESSION['user_id'];
//$select = "SELECT * FROM `users` WHERE `id` = '$id'";
//$query = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '$id'");
//$query = mysqli_query($connect, "SELECT * FROM `posts` WHERE `user_id` = '$id'");
//$data = mysqli_fetch_assoc($query);
//$post_id = $data['post_id'];
//
//$query1 = mysqli_query($connect, "SELECT * FROM `comments` WHERE `post_id` = '$post_id'");
//$data1 = mysqli_fetch_assoc($query1);
//$image = $data['img_name'];
//
//$query2 = mysqli_query($connect, "SELECT * FROM `category`");
//$data2 = mysqli_fetch_assoc($query2);
//$category = $data2['category_name'];

$selectAll = mysqli_query($connect, "SELECT posts.*, users.name, users.lastname, users.avatar, category.category_name FROM posts INNER JOIN users ON posts.user_id = users.id INNER JOIN category ON posts.category_id = category.id");





//
//
//if(isset($_POST['comment'])) {
//    if (isset($_POST['comtext']) && !empty($_POST['comtext'])) {
//        $comment = $_POST['comtext'];
//        $insert3 = mysqli_query($connect, "INSERT INTO `comments` (`post_id`, `comment`) VALUES ('$post_id','$comment')");
//    }
//}
//
//$query2 = mysqli_query($connect, "SELECT * FROM `comments` WHERE `post_id` = '$post_id'");
//$data2 = mysqli_fetch_assoc($query2);
// while ($data2 = mysqli_fetch_array($query2)) {
//    $result = $data2['comment'];
//    }
//$select = mysqli_query($connect, "SELECT * FROM `posts` FULL OUTER JOIN `comments` ON `posts.post_id = comments.post_id`");
//var_dump($select);

$comment = $_POST['comment'];
$submit = $_POST['submit'];
if($submit){
    if($comment){
        $insert = mysqli_query($connect, "INSERT INTO `comments` (`post_id`, `comment`) VALUES ('$post_id','$comment')");
    }
}
?>

<div class="container">
    <?php while($allData = mysqli_fetch_assoc($selectAll)){ ?>
    <h2 class="text-center">Your Post</h2>
        <p style="font-style: italic;font-size: 25px;color: lightseagreen">Post anox`</p>
        <span class="info" style="font-size: 16px"><?=$allData['name']." ".$allData['lastname']?></span>
        <p style="font-style: italic;font-size: 25px;color: lightseagreen">Post Category`</p>
    <span class="info" style="font-size: 16px"><?=$allData['category_name']?></span>
    <p class="mt-3" style="font-style: italic;font-size: 25px;color: lightseagreen">Post Title`</p>
    <span class="info" style="font-size: 16px"><?=$allData['title']?></span>
    <p class="mt-3" style="font-style: italic;font-size: 25px;color: lightseagreen">Description`</p>
    <p class="info" style="font-size: 16px"><?=$allData['description'] ?></p>
    <?php echo '<img class="img-fluid" style="width:300px;height:220px"  src="assets/postimages/'.$allData['img_name'].'">' ?>

<?php }?>
    <form action="postpage.php" method="post" style="background: white;position:absolute; left: 100px">
        <table class="table">
            <tr><td colspan="2"><textarea name="comment"></textarea> </td></tr>
            <tr><td ><input type="submit" name="submit" value="Comment"> </td></tr>
        </table>
<!--        <p> --><?//=$one_comment?><!--</p>-->
    </form>

    <?php
//    $getquery = mysqli_query($connect, "SELECT * FROM `comments` ORDER BY `comment_id` ASC ");
//    while($rows = mysqli_fetch_array($getquery)){
//        $one_comment = $rows['comment'];
//
//        echo "  <div style='margin:30px 0px;'>
//            <p>Comment: $one_comment<br /></p>
//
//        </div>
//      ";
//    }
    ?>


</div>


<?php include "layout/footer.php"?>
