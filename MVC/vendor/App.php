<?php
include_once VENDOR."Controller.php";
abstract class App
{
    public static function run(){
        $uri = $_SERVER['REQUEST_URI'];
        $uriArr = explode('/',$uri);

        $controller = DEFAULT_CONTROLLER;
        $action = DEFAULT_ACTION;

        if(isset($uriArr[1]) && !empty($uriArr[1])){
            $controller = $uriArr[1];
        }

        if(isset($uriArr[2]) && !empty($uriArr[2])){
            $action = $uriArr[2];
        }

        $controllerName = ucfirst($controller)."Controller";
        $controllerFileName = $controllerName.".php";

        if(file_exists(CONTROLLERS.$controllerFileName)){
            include_once CONTROLLERS.$controllerFileName;
            if(class_exists($controllerName)){
                $obj = new $controllerName();
                if(method_exists($obj,$action)){
                    $obj->$action();
                }else{
                    throw new Exception("Method name is invalid !!".$action."!!",409);
                }
            }else{
               throw new Exception("Class $controllerName not found in $controllerFileName",455);
            }
        }else{
            throw new Exception("Controller ".$controllerFileName." does not exists in ".CONTROLLERS.$controllerFileName,404);
        }
    }
}