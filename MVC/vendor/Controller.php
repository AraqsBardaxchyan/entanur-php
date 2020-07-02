<?php
abstract class Controller
{
    private $layout = DEFAULT_LAYOUT;

    public function setLayout($layout){
        $this->layout = $layout;
        return $this;
    }

    public function redirect($url){
        header('location:'.$url);die;
    }

    public function render($view){

        //tnain  $view lini user.profile
        //tnain  $view lini user.test.asd
        ob_start();
            include_once VIEWS.$view.".php";
        $content = ob_get_clean();

        include_once LAYOUTS.$this->layout.".php";
    }
}