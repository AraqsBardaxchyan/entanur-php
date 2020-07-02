<?php
session_start();
include "../config/connect.php";
include "../layout/header.php";

$id = $_SESSION['user_id'];
$select = mysqli_query($connect,"SELECT * FROM `gallery` WHERE `user_id`='$id'");

echo "<h1 class='text-center text-secondary'>Image Gallery</h1>";

////// FIRST WE SET UP THE TOTAL IMAGES PER PAGE & CALCULATIONS:
$per_page = 4;// Number of images per page, change for a different number of images per page

// Get the page and offset value:
if (isset($_GET['page'])) {
    $page = $_GET['page'] - 1;
    $offset = $page * $per_page;
} // Otherwise we render the page and offset as non-existent:
else {
    $page = 0;
    $offset = 0;
}

// Count the total number of images in the table ordering by their id's ascending:
$images = "SELECT count(`id`) FROM `gallery` ORDER by `id` ASC";
$result = mysqli_query($connect, $images);
$row = mysqli_fetch_array($result);
$total_images = $row[0];

// Calculate the number of pages:
if ($total_images > $per_page) {//If there is more than one page
    $pages_total = ceil($total_images / $per_page);
    $page_up = $page + 2;
    $page_down = $page;
    $display = '';//leave the display variable empty so it doesn't hide anything
} else {// Else if there is only one page
    $pages = 1;
    $pages_total = 1;
    $display = ' class="display-none"';//class to hide page count and buttons if only one page
}

echo '<h2 class="text-secondary" style="text-align:center"'.$display.'>Page '; echo $page + 1 .' of '.$pages_total.'</h2>';// Page out of total pages

$i = 1;// Set the $i counting variable to 1

echo '<div id="pageNav" style="text-align:center" class="mt-5"'.$display.'>';// our $display variable will do nothing if more than one page

// Show the page buttons:
if ($page) {
//    echo '<a href="gallery.php"><button class="btn btn-default"><<</button></a>';// Button for first page [<<]
    echo '<a href="gallery.php?page='.$page_down.'"><button  class="btn btn-default"><</button></a>';// Button for previous page [<]
}

for ($i=1;$i<=$pages_total;$i++) {
    if(($i==$page+1)) {
        echo '<a href="gallery.php?page='.$i.'"><button class="btn active btn-default">'.$i.'</button></a>';// Button for active page, underlined using 'active' class
    }

// In this next if statement, calculate how many buttons you'd like to show. You can remove to show only the active button and first, prev, next and last buttons:
    if(($i!=$page+1)&&($i<=$page+3)&&($i>=$page-1)) {// This is set for two below and two above the current page
        echo '<a href="gallery.php?page='.$i.'"><button  class="btn btn-default">'.$i.'</button></a>'; }
}

if (($page + 1) != $pages_total) {
    echo '<a href="gallery.php?page='.$page_up.'" ><button class="btn btn-default">></button></a>';// Button for next page [>]
//    echo '<a href="gallery.php?page='.$pages_total.'"><button  class="btn btn-default">>></button></a>';// Button for last page [>>]
}
echo '</div>';// #pageNav end

echo '<div id="gallery" class=" mt-5 mb-5 ml-4 h-75" style="text-align:center">';// #gallery div to contain the gallery

$result = mysqli_query($connect, "SELECT * FROM `gallery` ORDER by `id` ASC LIMIT $offset, $per_page");
while($row = mysqli_fetch_array($result)) {// Open the while array loop


    $image=$row['img_name'];


// Then we echo our HTML for each image:
    echo '<div class="img-container">';
    echo '<div class="img-fluid" style="width:300px;height:250px;float: left;margin: 15px;">';

    echo '<img class="img-fluid nkar w-100 h-80" src="../assets/gallery/'.$image.'">';
    ?>

    <button class="delete btn btn-danger mt-2 w-50" style="float: left">Delete</button>


    <?php
    echo '</div>';// .img end


    echo '</div>';// .img-container end

}// Close the while array loop

echo '</div>';// #gallery end



echo '<div class="clearfix"></div>';// The clearfix


?>

    <div class="container mt-5">
        <div class="row">
            <form class="w-100" action="gallery_proccess.php" method="post" enctype="multipart/form-data">
                <div class="col-sm-2 offset-sm-4">
                    <label for="gall" class="btn btn-warning w-100">Choose</label>
                    <input id="gall" type="file" hidden name="upload[]" multiple>
                </div>
                <div class="col-sm-2">
                    <button name="upload" class="btn btn-success w-100">Upload</button>
                </div>
            </form>
        </div>
<!--        <div class="row mt-5">-->
<!--            --><?php
//            while ($data = mysqli_fetch_assoc($select) ){
//                ?>
<!--                <div class="col-sm-2 cursor-pointer mt-2">-->
<!--                    <a href="#" class="position-absolute right-0 text-danger" class="delete">&times</a>-->
<!--                    <img src="../assets/gallery/--><?//=$data['img_name']?><!--" alt="" class="img-fluid" data-index="--><?//=$data['id']?><!--">-->
<!--                </div>-->
<!--                --><?php
//            }
//            ?>
<!--        </div>-->



    </div>




<?php
include "../layout/footer.php";