<?php
require_once 'app/models/pendienteM.php';
require_once 'app/models/usuarioM.php';

class indexC
{
    
    private $pendienteM;
    
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
    public function iniciado(){
         $mostrarLista1 = $this->mostrarLista();
            $userAdmin = new usuarioM('administrador@gmail.com',123456,'Roberto','Martinez',true);
            $userCliente = new usuarioM('cliente@gmail.com',123456,'Maria','Rodriguez',false);
            $username = $_POST['username']??'';
            $password = $_POST['password']??'';
            if($username == $userAdmin->getUsername() && $password == $userAdmin->getPassword()){
                $_SESSION['sesion'] = true;
                
                $_SESSION['isAdmin'] = $this->isAdmin($userAdmin);
                
                $_SESSION['nombre'] = $this->nombreLogueado($userAdmin);
                require_once 'app/views/index.php';
            }elseif($username == $userCliente->getUsername() && $password == $userCliente->getPassword()){
                $_SESSION['sesion'] = true;
                
                
                $_SESSION['isAdmin'] = $this->isAdmin($userCliente);
                $_SESSION['nombre']  = $this->nombreLogueado($userCliente);
                require_once 'app/views/index.php';
            }else{
                echo 'Error de sesion';
            }
    }
    public function index()
    {
        
        $mostrarLista1 = $this->mostrarLista();
        if(isset($_SESSION['sesion'])&&$_SESSION['sesion']==true){
            
           require_once 'app/views/index.php';
        }else{
            echo 'sesion fallida';
            require_once 'app/views/login.php';
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
        if(isset($_SESSION['sesion'])&&$_SESSION['sesion']==true){
            
           $id = $id;
        $resp = $this->pendienteM->mostrarPorId($id);
        require_once 'app/views/details.php';
        }else{
            echo 'sesion fallida';
            require_once 'app/views/login.php';
        }
        
        
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
        if(isset($_SESSION['sesion'])&&$_SESSION['sesion']==true){
            
        require_once 'app/views/create.php';
        }else{
            echo 'sesion fallida';
            require_once 'app/views/login.php';
        }
        
    }
    public function ccreacion()
    {

        if(isset($_SESSION['sesion'])&&$_SESSION['sesion']==true){
            
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        
        $this->pendienteM->nuevoPendiente($titulo, $descripcion, FALSE);
        $creacion = $this->mostrarLista();
        require_once 'app/views/ccreacion.php';
        }else{
            echo 'sesion fallida';
            require_once 'app/views/login.php';
        }
        
    }
    public function cdetails($id)
    {
        if(isset($_SESSION['sesion'])&&$_SESSION['sesion']==true){
            
        $id = $id;
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $this->pendienteM->editarTitulo($id, $titulo);
        $actualizacion = $this->mostrarLista();
        
        require_once 'app/views/cdetails.php';
        }else{
            echo 'sesion fallida';
            require_once 'app/views/login.php';
        }
        
    }
    public function delete($id)
    {
        if(isset($_SESSION['sesion'])&&$_SESSION['sesion']==true){
            
        $id = $id;
        
        $eliminarPendiente = $this->eliminarPendiente($id);
        $mostrarLista2 = $this->mostrarLista();
        
        require_once 'app/views/delete.php';
        }else{
            echo 'sesion fallida';
            require_once 'app/views/login.php';
        }
        
    }

    public function cerrarSesion(){
        session_destroy();
        require_once 'app/views/login.php';
    }
}
