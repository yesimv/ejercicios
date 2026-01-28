<?php

class UsuariosModel{
    
    private $id;
    public function create($username,$password,$name,$lastName,$email,$isAdmin)
    {
        if(!isset($_SESSION['users'])){
            $_SESSION['users']=[];
        }
        if(!isset($_SESSION['users_id'])){
            $_SESSION['users_id'] =1;
        }
        $this->id++;
        $_SESSION['users'][]= [
            'id' => $_SESSION['users_id'],
            'isActive' => TRUE,
            'username' => $username,
            'password' => $password,
            'name' => $name,
            'lastName' => $lastName,
            'email' => $email,
            'isAdmin' => $isAdmin
        ];
        $_SESSION['user_id']++;
    }
    public function setSesion($username,$password){
        if(!isset($_SESSION['sesion'])){
            $_SESSION['sesion']=[];
        }
        foreach($_SESSION['users'] as $index=>$valor){
            if($valor['username']==$username && $valor['password']==$password){
                $_SESSION['sesion'][]=[
                    //se copean los valores del user
                ];
            }
        }
    }

    public function getAll(){
        return $_SESSION['users'];
    }

    public function getById($id){
        foreach($_SESSION['users'] as $user){
            if($user['id'] == $id){
                return $user;
            }
        }
    }
    public function editById($id,$username,$password,$name,$lastName,$email,$isAdmin){
        foreach($_SESSION['users'] as $index =>$propiedad){
            if($propiedad['id'] == $id){
                $_SESSION['users'][$index]=[
                    'username' => $username,
                    'password' => $password,
                    'name' => $name,
                    'lastName' => $lastName,
                    'email' => $email,
                    'isAdmin' => $isAdmin
                ];
            }
        }
    }
    public function deleteById($id){
        foreach($_SESSION['users'] as $index =>$propiedad){
            if($propiedad['id'] == $id){
                unset($_SESSION['users']['index']);
            }
        }
    }
}