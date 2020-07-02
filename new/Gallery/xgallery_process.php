<?php
session_start();
$myFileX = 'gallery.xml';
$target_dir = 'images/';
$userid = $_SESSION['user']['id'];
$count = count($_FILES['upload']);
function reArrayFiles()
{
    $files = [];
    $count = count($_FILES["upload"]["name"]);
    for ($i = 0; $i < $count; ++$i) {
        $files[] = [
            'name' => $_FILES["upload"]["name"][$i],
            'type' => $_FILES["upload"]["type"][$i],
            'tmp_name' => $_FILES["upload"]["tmp_name"][$i],
            'size' => $_FILES["upload"]["size"][$i]
        ];
    }
    return $files;
}
function getExtension($name)
{
    $parts = explode('.', $name);
    return end($parts);
}

function unique($prefix)
{
    return uniqid($prefix . '_', true);
}
session_start();
$imageNames = [];
foreach (reArrayFiles() as $file) {
    $imageName = unique('g') . '.' . getExtension($file['name']);
    $path = $target_dir . $imageName;
    $imageNames[] = $imageName;
    move_uploaded_file($file["tmp_name"], $path);
}
        $objects = [];
        $xmlString = file_get_contents($myFileX);
        $objects = simplexml_load_string($xmlString);
        $xml = new DOMDocument("1.0","UTF-8");
        $xml->load($myFileX);
        $rootTag = $xml->getElementsByTagName("images")->item(0);
        foreach ($imageNames as $imageName) {
        $dataTag = $xml->createElement("image");
        $idTag = $xml->createElement("user_id",$userid);
        $fTag = $xml->createElement("image_name",$imageName);
        $dataTag->appendChild($idTag);
        $dataTag->appendChild($fTag);
        $rootTag->appendChild($dataTag);
        $xml->save($myFileX);
   }
            header('Location: xgallery.php');
            die;
            
