<?php
include_once '../configs/constants.php';
include_once VENDOR."App.php";

try{
    App::run();
}catch (Exception $exception){
    include_once VENDOR."error.php";
}