<?php
class usuarioM{
    


    

    public function nuevoUsuario($username,$password,$name,$apellido,$isAdmin)
    {
        if (!isset($_SESSION['users'])) {
                $_SESSION['users'] = [];
                
            }
        if (!isset($_SESSION['users_id'])) {
        $_SESSION['users_id'] = 1;
        }
        
        $_SESSION['users'][]=[
                    'id' => $_SESSION['users_id'],
                    'username'=>$username,
                    'password'=>$password,
                    'name'=>$name,
                    'apellido'=>$apellido,
                    'isAdmin'=>(bool)$isAdmin
        ];
        
        $_SESSION['users_id']++;
        return;
    }

public function getLista(){
    return $_SESSION['users'];
}


public function setSesion($userId,$name,$apellido,$isAdmin){
    if (!isset($_SESSION['sesion'])) {
                $_SESSION['sesion'] = [];
            }
    $_SESSION['sesion'] =[
        'isActive' => true,
        'userId' => $userId,
        'nombre' => $name,
        'apellido' => $apellido,
        'isAdmin' => (bool)$isAdmin
    ];
}
public function getSesionName(){
    
    return $_SESSION['sesion']['nombre']." ".$_SESSION['sesion']['apellido'];
}
public function isAdmin(){
    
    return $_SESSION['sesion']['isAdmin'];
    
} 

static function datosUsuario(){
    return $_SESSION['sesion'];
}
   

 

}
?>