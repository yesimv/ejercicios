<?php

class auth
{

    static function sessionIniciada()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    static function isAuth() {
        if(!isset($_SESSION['sesion'])){
           require_once 'app/views/login.php';
           exit;
        }
    }

    static function closeSession(){
        unset($_SESSION['sesion']);
        //session_destroy();
        require_once 'app/views/login.php';
        exit;
    }
}


