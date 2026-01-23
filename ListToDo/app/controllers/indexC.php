<?php
require_once 'app/models/pendienteM.php';
require_once 'app/models/usuarioM.php';

class indexC
{
    private $user;
    private $admin;
    private $pendienteM;
    private $sesion;
    public function __construct()
    {
        $this->pendienteM = new pendienteM();
        
    }
    public function login(){
        if(isset($_SESSION['sesion'])&&$_SESSION['sesion']==true){
           require_once 'app/views/index.php';
        }else{
           require_once 'app/views/login.php';
        }
    }

    public function index()
    {
        
        $mostrarLista1 = $this->mostrarLista();
        $userAdmin = new usuarioM('administrador@gmail.com',123456,'Roberto','Martinez',true);
        $userCliente = new usuarioM('cliente@gmail.com',123456,'Maria','Rodriguez',false);
        $username = $_POST['username']??'';
        $password = $_POST['password']??'';
        if($username == $userAdmin->getUsername() && $password == $userAdmin->getPassword()){
           $_SESSION['sesion'] = true;
           $user= $this->isAdmin($userAdmin);
           $this->admin = true;
           $nombreCompleto = $this->nombreLogueado($userAdmin);
            require_once 'app/views/index.php';
        }elseif($username == $userCliente->getUsername() && $password == $userCliente->getPassword()){
           $_SESSION['sesion'] = true;
           $this->admin = false;
           $user= $this->isAdmin($userCliente);
           $nombreCompleto = $this->nombreLogueado($userCliente);
            require_once 'app/views/index.php';
        }else{
            require_once 'app/views/login.php';;
        }

        
    }
    public function isAdmin($objeto){
        
        return $objeto->isAdmin();
        
    }

    public function nombreLogueado($objeto){
        return $objeto->getNombre()." ".$objeto->getApellid();
    }

    public function mostrarLista()
    {
        return $this->pendienteM->mostrarPendientes();
    }
    public function mostrarPendiente($id)
    {
        
        $user = $this->admin;
        $id = $id;
        $resp = $this->pendienteM->mostrarPorId($id);
        require_once 'app/views/details.php';
    }
    public function editarTitulo($id, $titulo)
    {
        $this->pendienteM->editarTitulo($id, $titulo);

    }
    public function editarDescripcion($id, $descripcion)
    {
       
        $this->pendienteM->editarDescripcion($id, $descripcion);
    }
    public function eliminarPendiente($id)
    {
        return $this->pendienteM->eliminarPorId($id);
    }

    public function create()
    {
        require_once 'app/views/create.php';
    }
    public function ccreacion()
    {
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $user = $this->admin;
        $this->pendienteM->nuevoPendiente($titulo, $descripcion, FALSE);
        $creacion = $this->mostrarLista();
        require_once 'app/views/ccreacion.php';
    }
    public function cdetails($id)
    {
        $user =$this->admin;
        $id = $id;
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $this->pendienteM->editarTitulo($id, $titulo);
        $actualizacion = $this->mostrarLista();
        
        require_once 'app/views/cdetails.php';
    }
    public function delete($id)
    {
        $id = $id;
        $user = $this->user;
        $eliminarPendiente = $this->eliminarPendiente($id);
        $mostrarLista2 = $this->mostrarLista();
        
        require_once 'app/views/delete.php';
    }

    public function cerrarSesion(){
        session_destroy();
        require_once 'app/views/login.php';
    }
}
