<?php

class LoginController extends Controllers
{
    protected $modeloUsuarios;
    protected $modeloTareas;
    public function __construct()
    {
        $this->model("UsuariosModel");
        $this->modeloUsuarios = new UsuariosModel;
        $this->model("TareasModel");
        $this->modeloTareas = new TareasModel;
    }
    public function index()
    {
        Auth::isAuth();
        $this->view('home/index');
    }
    public function setSesion()

    {

        $sesion= $this->modeloUsuarios->setSesion($_POST['username'], $_POST['password']);
        echo $sesion;
        Auth::isAuth();
        $datos=[
            
            'listaTareas'=>$this->modeloTareas->getAll(),
            'userSesion'=>$this->modeloUsuarios->getSesion()
        ];
        $this->view('tareas/main',$datos);
    }
    public function logOut()
    {
        Auth::closeSession();
    }
}
