<?php
require_once "./app/models/model.php";


class controller
{
        
    
    public function index()
    {
        
        $usuarioEmpleado = new Usuario('Yesenia', 'Morales', 'Desarrollo', FALSE);
      //  $usuarioJefe = new Usuario('Erick', 'Retes', 'Desarrollo', TRUE);
       // $usuarioJefe2 = new Usuario('Pedro', 'lopez', 'Desarrollo', FALSE);
      //  $usuarioJefe3 = new Usuario('Luisa', 'cota', 'Desarrollo', FALSE);
       
       $this->redirecion($usuarioEmpleado);
        
        //$this->isAdmin($usuarios) ;
        
        /* if($usuarioJefe->esAdmin() === TRUE){
            echo "Es Admin";
            require_once './app/views/admin/index.php';
            echo $hola;

        }else{
            echo "Es usuario";
            require_once './app/views/users/index.php';
        }; */

        //variable para vista empleado
       /*  $vistaEmpleado = $usuarioEmpleado->esAdmin();
        //variable apra vista administrador
        $vistaJefe = $usuarioJefe->esAdmin(); */
  
   
    }
 
    public function getAdmin($usuarios){
            
        foreach($usuarios as $usuario){
            
            if($usuario->esAdmin()){
                echo $usuario->getNombre();
            }
        }
    }
    public function getNombresUsuario($usuarios){
        foreach($usuarios as $usuario){
            return $usuario->getNombre(). '</br>';
        }
    }
    public function redirecion($usuario){
         $nombreCompleto = $usuario->getNombre(). " ". $usuario->getApellido();
         $departamento = $usuario->getDepartamento();
        if($usuario->esAdmin() === TRUE){
            
            require_once './app/views/admin/index.php';
            

        }else{
            
            require_once './app/views/users/index.php';
        };
    }
    


}
