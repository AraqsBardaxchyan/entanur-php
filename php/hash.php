/*
1, datan veacel xml 

2, datan veracel json

3/ datan pahel file mej 


4, poxakerpel pahpanvac datan php arrayi 
*/
/*
sa ayn gorciqn e vor@ useri datan karox e pahel file mej

$test_array = array (
  
  'bla' => 'blub',
  'foo' => 'bar',
  'another_array' => array (
    'stack' => 'overflow',
  ),
);
$file_name =  __DIR__.'/bla-'.time().'.xml'; 
$xml = new SimpleXMLElement('<root/>');
array_walk_recursive($test_array, array ($xml, 'addChild'));
print $xml->asXML($file_name);

/*
filic tvyalner kanchelu hamar
*/

/*$xml = simplexml_load_file($file_name);
print_r($xml);
/* datan pahel file mej jsoin formatov 
*/
$response = array (
  
  'bla' => 'blub',
  'foo' => 'bar',
  'another_array' => array (
    'stack' => 'overflow',
  ),
);


$file_name =  __DIR__.'/bla-'.time().'.json'; 
$fp = fopen($file_name,  'w');
fwrite($fp, json_encode($response));
fclose($fp);


/**kanchel datan json formatov **/

echo 'res<br />'; 





$handle = fopen($file_name, "rb");
$contents = fread($handle, filesize($file_name));
fclose($handle);
$data = json_decode($contents); 
//ete print aneluc tesnum es stdClass Object kanchel slaqov $data->bla
print_r($data); 

/*

1. stugel login status 
2. uxarkel login ej kam, registratia
3. regiswtatiayi jamanak ogtagocel grelu datan grelu funcianer@ tox 105 kam 127
4. ete logini forman e sabmi texel ogtagocel datan kanchelu funcianer@ 142 kam 111
*/
?>**/<?php
echo md5 ('12345');
?>











//<?php
session_start();
if(!file_exists('users/' . $_SESSION ['username'] . '.xml')){
    header('Location: login.php');
    die;
}
?>