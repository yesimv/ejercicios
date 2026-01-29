<?php

class auth
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
            header("Location: " . BASE_URL . "/login/login");
        }
    }
    public static function closeSession()
    {
        unset($_SESSION['sesion']);
        header("Location: " . BASE_URL . "/login/login");
    }
}
