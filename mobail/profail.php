<?php
session_start();
include "layout/header.php";
?>
<h1>welcome<?=$_SESSION['username']?></h1>


<script src="../assets/js/script.js"></script>
<?php
include "layout/footer.php";
?>
