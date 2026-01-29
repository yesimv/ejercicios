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
        } else {
            echo 'sesion iniciada';
        }
    }
    public static function closeSession()
    {
        unset($_SESSION['sesion']);
        require "../app/views/login/login.php";
    }
}
