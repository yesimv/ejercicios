<?php

require_once 'app/models/usuarioM.php';

class usuarioC
{
    
    
    private $usuarioM;
    
    
    public function __construct()
    {
        
        $this->usuarioM = new usuarioM();
    }
    
    
    public function nuevoRegistro(){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $name = $_POST['name'];
            $apellido = $_POST['apellido'];
            $isAdmin = isset($_POST['isAdmin']);
            $this->usuarioM->nuevoUsuario($username,$password,$name,$apellido,$isAdmin);
            
            require_once 'app/views/login.php';

    }
   
    public function getSesionName(){
        return $this->usuarioM->getSesionName();
    } 
    
    public function isAdmin(){
        return $this->usuarioM->isAdmin();
    }

    public function create()
    {
        auth::isAuth();
        require_once 'app/views/create.php';
    }


    public function cerrarSesion(){
        unset($_SESSION['sesion']);
        //session_destroy();
        

        require_once 'app/views/login.php';
    }
}
