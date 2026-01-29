<?php

//ES EL HIJO                        //papa
class UsuariosController extends Controllers{

    protected $modeloUsuarios;

    public function __construct() {
        $this->model("UsuariosModel"); //ruta de tu archivo
        $this->modeloUsuarios = new UsuariosModel();        
    }

    public function index(){ //getall
        Auth::isAuth();
        Auth::isAdmin();
       $data=[
        'userSesion'=>$this->modeloUsuarios->getSesion(),
        'listaUsuarios'=>$this->modeloUsuarios->getAll()
       ];
       $this->view("usuarios/main",$data);
    }
    public function newUser(){
        
        $this->view('login/new-user');
    }
    public function newUsuario(){
        Auth::isAuth();
        Auth::isAdmin();
        $data=[
            'userSesion'=>$this->modeloUsuarios->getSesion()
        ];
        $this->view('usuarios/crear',$data);
    }
    public function createNew(){

        $this->modeloUsuarios->create($_POST['username'],$_POST['password'],$_POST['name'],$_POST['lastName'],$_POST['email'],isset($_POST['isAdmin']));
        
        $this->index();
    }
    public function create(){
        $this->modeloUsuarios->create($_POST['username'],$_POST['password'],$_POST['name'],$_POST['lastName'],$_POST['email'],isset($_POST['isAdmin']));
        $this->view('login/login');
    } 

    public function deleteById($id){
        Auth::isAuth();
        Auth::isAdmin();
       $this->modeloUsuarios->deleteById($id);
       $this->index();
    }
    public function viewUsuario($id){
        Auth::isAuth();
        Auth::isAdmin();
        $datos=[
            'datosUsuario'=>$this->modeloUsuarios->getById($id),
            'ruta'=>'de usuarios a ver usuario',
            'userSesion'=>$this->modeloUsuarios->getSesion()
        ];
        $this->view('usuarios/ver',$datos);
        
    }

    public function editById($id){
       $this->modeloUsuarios->editById($id,$_POST['username'],$_POST['password'],$_POST['name'],$_POST['lastName'],$_POST['email'],isset($_POST['isAdmin']));
        $this->index();
    }

    /* public function find($id){
        $this->modeloUsuarios->getById($id);
        echo "controlador usuarios metodo find";

    } */


}