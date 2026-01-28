<?php

class LoginController extends Controllers{
    protected $modeloUsuarios;
    public function __construct()
    {
        $this->model("UsuariosModel");
        $this->modeloUsuarios = new UsuariosController;
    }
    public function setSesion(){
        $this->modeloUsuarios->setSesion($_POST['username'],$_POST['password']);
    }
}