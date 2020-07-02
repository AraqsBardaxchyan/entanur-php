<?php
class UserController extends Controller
{
    public function index(){
        $this->redirect('/login');
//        echo "hello from USERCONTROLLER INDEX METHOD";
    }

    public function test(){

        echo "hello from USERCONTROLLER TEST METHOD";
    }
}