<?php
session_start();
$myFile = 'gallery.json';
$target_dir = 'images/';
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
            $jsondata = [];
            $jsonString = file_get_contents($myFile);
            $jsonData = json_decode($jsonString, true);
            foreach ($imageNames     as $imageName) {
                $jsonData []= [
                    'user_id' => $_SESSION['user']['id'],
                    'image_name' => $imageName,
                ];
            }
            $jsonString = json_encode($jsonData,JSON_PRETTY_PRINT);
            if(file_put_contents($myFile, $jsonString)){
                header('Location: gallery.php');
                die;
            }
