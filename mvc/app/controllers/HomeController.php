<?php

//hijo                          //papa
class HomeController extends Controllers
{

    protected $modeloUsuarios;
    protected $modeloTareas;
    public function __construct()
    {
        $this->model("UsuariosModel");
        $this->modeloUsuarios = new UsuariosModel();
        $this->model("TareasModel");
        $this->modeloTareas = new TareasModel();
    }
    public function index()
    { //getall
        Auth::isAuth();
        
        
        $data=[
            'listaUsuarios'=>$this->modeloUsuarios->getAll(),
            'ruta'=>'aqui entro desde home controller',
            'userSesion'=>$this->modeloUsuarios->getSesion(),
            'listaTareas'=>$this->modeloTareas->getAll()
        ];
        $this->view("tareas/main",$data);
    }
}
