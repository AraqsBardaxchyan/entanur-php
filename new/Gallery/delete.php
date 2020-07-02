<?php
session_start();
if ($_POST["action"] == "deleteimage") {
    $imagefile = $_POST['imagefile'];
    unlink($imagefile);
$id = $_POST["id"];
$user = $_POST["user"];    
$myFileJ = 'gallery.json';
$myFileX = 'gallery.xml';
$xml = new SimpleXMLElement($myFileX,0,true);
  $count = 0;
foreach ($xml as $dat){
if ($user == $dat->user_id){
if ($id == $dat->image_name){
unset($xml->image[$count]); 
file_put_contents($myFileX,$xml->saveXML());
break;
}    
}
$count++;
}   
$jsonString = file_get_contents($myFileJ);
$jsonData = json_decode($jsonString, true);   
foreach ($jsonData as $i => $val) {
  if ($val['image_name'] == $id) {
  if ($val['user_id'] == $user){
      unset ($jsonData[$i]);
      $save = json_encode(array_values($jsonData), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents($myFileJ, $save);
            break;
  }
  }      
}       
}
?>