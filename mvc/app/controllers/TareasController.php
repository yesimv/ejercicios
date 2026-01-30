<?php

class TareasController extends Controllers{
    protected$modeloUsuarios;
    protected$modeloTareas;
    public function __construct()
    {
        $this->model("UsuariosModel");
        $this->model("TareasModel");
        $this->modeloUsuarios = new UsuariosModel();
        $this->modeloTareas = new TareasModel();
    }

    public function index(){
        Auth::isAuth();
        
        $data=[
            
            'listaTareas'=>$this->modeloTareas->getAll(),
            'userSesion'=>$this->modeloUsuarios->getSesion()
        
        ];
        $this->view("tareas/main",$data);
    }
    public function getAll(){
       return $this->modeloTareas->getAll();
    }
    public function getById($id){
        return $this->modeloTareas->getById($id);
    }
    public function newTarea(){
        Auth::isAuth();
        $data=[
            'userSesion'=>$this->modeloUsuarios->getSesion()
        ];
        $this->view('tareas/crear',$data);
    }
    public function create(){
        Auth::isAuth();
        $this->modeloTareas->create($_POST['title'],$_POST['notes']);
        
        $this->index();
    }
    public function viewTarea($id){
        Auth::isAuth();
        $datos=[
            'datosTarea'=>$this->getById($id),
            
            'listaTareas'=>$this->modeloTareas->getAll(),
            'userSesion'=>$this->modeloUsuarios->getSesion()
        ];
        $this->view('tareas/ver',$datos);
    }
    public function editById($id){
        Auth::isAuth();
        $this->modeloTareas->editById($id,$_POST['title'],$_POST['notes']);
        $this->index();
    }
    public function deleteById($id){
        Auth::isAuth();
        $this->modeloTareas->deleteById($id);
        $this->index();
    }
    public function changeStatus($id){
        Auth::isAuth();
        $this->modeloTareas->changeStatus($id);
        $this->index();
    }
}