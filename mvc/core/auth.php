<?php

class Auth
{
    public static function sessionStart()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    public static function isAuth()
    {
        if (!isset($_SESSION['sesion'])) {
            require "../app/views/login/login.php";
            exit;
        } 
    }

    public static function isAdmin(){
        if(!$_SESSION['sesion']['isAdmin']){
            echo 'Permiso denegado y sesion cerrada';
            unset($_SESSION['sesion']);
            require "../app/views/login/login.php";
            exit;
        }
    }
    public static function closeSession()
    {
        unset($_SESSION['sesion']);
        //unset($_SESSION['tareas']);
        require "../app/views/login/login.php";
    }
}
