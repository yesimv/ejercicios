<?php

//hijo                          //papa
class HomeController extends Controllers
{

    public function index()
    { //getall
        Auth::isAuth();
        $this->view("index");
    }
}
