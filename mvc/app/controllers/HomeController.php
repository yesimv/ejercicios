<?php

//hijo                          //papa
class HomeController extends Controllers{
    
      public function index(){ //getall
        
       $this->view("login/login");
    }
    
}