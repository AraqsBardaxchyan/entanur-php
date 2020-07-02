<?php
include_once "Database.php";

$db = new Database("users");


 $db->insert([
    'firstname'=>'poghos',
    'lastname'=>'poghosyan',
    'email'=>'pog4@mail.ru',
])->save();
echo "<pre>";
 var_dump($db->select()->where([
     'id'=>'7',
     'firstname'=>'poghos',
 ])->all());
 $db->update([
     'firstname'=>'petros',
     'lastname'=>'petrosyan',
 ])->where([
     'id'=> '34'
 ])->save();



$db->setTable("posts")->insert([
    'title'=>'test post 1',
    'description'=>'lorem ipsum dolor sit amet',
])->save();
$db->setTable('users')->delete()->where([
    'firstname'=>'poghos'
])->save();

//$db->setTable("users");
