<?php
session_start();
include "config/connect.php";
include "layout/header.php";
$select = mysqli_query($connect, "SELECT * FROM `category`");
//$id = $_SESSION['user_id'];
//$select = mysqli_query($connect,"SELECT * FROM `users` WHERE `user_id`='$id'");

?>

<div class="container">
    <h3 class="text-center mb-5">Here you can post anything...</h3>
    <div class="row">
        <div class="col-sm-4 offset-sm-4 mb-3">
            <div class="form-group">
                <form class="w-100" action="category/categoryProc.php" method="post">
                   <div class="row">
                       <div class="col-sm-9">
                           <input type="text" name="cat_name" class="form-control">
                       </div>
                       <div class="col-sm-3">
                           <button name="add" class="btn btn-success">Add</button>
                       </div>
                   </div>
                </form>
            </div>

        </div>
    </div>
    <form action="posts/postProccess.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <select class="form-control" name="select_cat">
                <option value="0">Choose Category</option>
                <?php while ($data = mysqli_fetch_assoc($select)) { ?>
                    <option value="<?=$data['id']?>">
                        <?=$data['category_name'] ?>
                    </option>
                <?php }?>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Post Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Title...">
        </div>
        <div class="form-group">
            <label for="description">Post Description</label>
            <input type="text" name="description" class="form-control" id="description" placeholder="Description...">
        </div>
        <div class="form-group">

            <div>
<!--                <label for="photo" class="btn btn-success w-50 mb-3">Choose</label>-->
                <input type="file" name="nkarik" multiple>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" name="postbtn" class="btn btn-info">Post !</button>
        </div>
    </form>
</div>

<?php include "layout/footer.php" ?>
