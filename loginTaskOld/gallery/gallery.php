<?php
session_start();
include "../config/connect.php";
include "../layout/header.php";

$id = $_SESSION['user_id'];
$perPage = 8;
$select = mysqli_query($connect,"SELECT * FROM `gallery` WHERE `user_id`='$id'");
$count = mysqli_num_rows($select);
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$offset =  ($currentPage - 1) * $perPage;
$select2 = mysqli_query($connect,"SELECT * FROM `gallery` WHERE `user_id`='$id' LIMIT $perPage OFFSET $offset");



?>

<div class="container">
    <div class="row">
        <form class="w-100" action="gallery_proccess.php" method="post" enctype="multipart/form-data">
            <div class="col-sm-2 offset-sm-4">
                <label for="gallery" class="btn btn-warning w-100">Choose</label>
                <input id="gallery" type="file" hidden name="upload[]" multiple>
            </div>
            <div class="col-sm-2">
                <button name="upload" class="btn btn-success w-100">Upload</button>
            </div>
        </form>
    </div>
    <div class="row mt-5">
        <?php
            while ($data = mysqli_fetch_assoc($select2) ){
         ?>
           <div class="col-sm-2 cursor-pointer mt-2">
               <a href="#" class="position-absolute right-0 text-danger delete">&times</a>
               <img src="../assets/gallery/<?=$data['img_name']?>" alt="" class="img-fluid for-id asd-<?=$data['id'] ?>" data-index="<?=$data['id']?>">
           </div>
        <?php
            }
        ?>
    </div>
    <div class="row">
        <?php if ($perPage < $count){ ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php $page = ceil($count / $perPage) ?>
                <?php for ($i = 1; $i <= $page; $i++){ ?>
                    <li class="page-item  <?= $i == $currentPage ? 'active' : ''?>">
                        <a class="page-link" href="?page=<?=$i ?>"><?=$i ?></a>
                    </li>
                <?php }?>
            </ul>
        </nav>
        <?php }?>
    </div>
</div>


<?php
include "../layout/footer.php";
