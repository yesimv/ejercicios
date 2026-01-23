<?php
class usuarioM{
    
    private $username;
    private $password;
    private $name;
    private $apellido;
    private $isAdmin;

    public function __construct($username,$password,$name,$apellido,$isAdmin)
    {
        $this->username = $username;
        $this->password = $password;
        $this->name = $name;
        $this->apellido = $apellido;
        $this->isAdmin = $isAdmin;
    }

    public function getNombre(){
        return $this->name;

    }
    public function getApellid(){
        return $this->apellido;
    }

    public function getUsername(){
        return $this->username;

    }

    public function getPassword(){
        return $this->password;
    }

    public function isAdmin(){
        return $this->isAdmin;
    }


}
?>