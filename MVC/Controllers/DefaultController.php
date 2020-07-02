<?php
class DefaultController extends Controller
{
    public function index(){
        $this->setLayout("dashboard")->render("home");

        //tnain  render lini ->render("user.profile")
        //tnain  render lini ->render("user.test.asd")
    }
}