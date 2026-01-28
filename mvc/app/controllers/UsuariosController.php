<?php

//ES EL HIJO                        //papa
class UsuariosController extends Controllers{

    protected $modeloUsuarios;

    public function __construct() {
        $this->model("UsuariosModel"); //ruta de tu archivo
        $this->modeloUsuarios = new UsuariosModel();        
    }

    public function index(){ //getall
       $data=[
        'listaUsuarios'=>$this->modeloUsuarios->getAll()
       ];
       $this->view("login/login",$data);
    }
    public function newUser(){
        $data=[
            'cambio'=>"cambio de vista login a new user",
            'accion'=>'redireccion de login a new-user'
        ];
        $this->view('login/new-user',$data);
    }

    public function create(){
        
        
        $this->modeloUsuarios->create($_POST['username'],$_POST['password'],$_POST['name'],$_POST['lastName'],$_POST['email'],isset($_POST['isAdmin']));
        
        $data = [
            'cambio'=>"cambio de vista new-user a login",
            'listaUsuarios'=>$this->modeloUsuarios->getAll()
        ];
        
        $this->view('login/login',$data);
    }

    public function delete($id){
       echo "controlador usuarios metodo delete";
    }

    public function update($id,$username,$password,$name,$lastName,$email,$isAdmin){
       echo "controlador usuarios metodo update";
    }

    public function find($id){
        $this->modeloUsuarios->getById($id);
        echo "controlador usuarios metodo find";

    }


}