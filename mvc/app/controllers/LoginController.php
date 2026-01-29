<?php

class LoginController extends Controllers
{
    protected $modeloUsuarios;
    public function __construct()
    {
        $this->model("UsuariosModel");
        $this->modeloUsuarios = new UsuariosModel;
    }
    public function index()
    {
        Auth::isAuth();
        $this->view('home/index');
    }
    public function setSesion()

    {

        $this->modeloUsuarios->setSesion($_POST['username'], $_POST['password']);
        Auth::isAuth();
        $this->view('index');
    }
    public function logOut()
    {
        Auth::closeSession();
    }
}
