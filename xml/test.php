<?php
$file = 'xx.xml'; 
/*echo $_SERVER["DOCUMENT_ROOT"]; 

$xml = simplexml_load_file(__DIR__."/".$file);
print_r($xml->asXML()); 
    $sxe = new SimpleXMLElement($xml->asXML());
    $newItem = $sxe->addChild("url");

    $newItem->addAttribute('id',7); // add this

    $newItem->addChild("email", "test222");
    $arr['email'] = 'test';
    $newItem->addChild("username", '+03:00');
    $newItem->addChild("password", 'weekly');
    $newItem->addChild("c_password", 'weekly');

    $sxe->asXML(__DIR__."/".$file);
    */
    $username = 'aram'; 
    $password = 'hj'; 
    $email = 'gfdg@kjhkj.kj'; 
    $file_name =  __DIR__.'/users/'. $username .'.xml'; 
	$fp = fopen($file_name,  'w');
	fwrite($fp, json_encode($response));
	fclose($fp);

    	$xml = new SimpleXMLElement('<user></user>');
        $xml->addChild('avatar','avatar');
        $xml->addChild('password', md5($password));
        $xml->addChild('email',$email);
        $xml->asXML($file_name);

?>
