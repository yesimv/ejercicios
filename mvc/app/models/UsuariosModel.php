<?php

class UsuariosModel
{

    
    public function create($username, $password, $name, $lastName, $email, $isAdmin)
    {
        if (!isset($_SESSION['users'])) {
            $_SESSION['users'] = [];
        }
        if (!isset($_SESSION['users_id'])) {
            $_SESSION['users_id'] = 1;
        }
        
        $_SESSION['users'][] = [
            'id' => $_SESSION['users_id'],
            'isActive' => TRUE,
            'username' => $username,
            'password' => $password,
            'name' => $name,
            'lastName' => $lastName,
            'email' => $email,
            'isAdmin' => $isAdmin
        ];
        $_SESSION['users_id']++;
    }
    public function setSesion($username, $password)
    {

        foreach ($_SESSION['users'] as $index => $valor) {
            if ($valor['username'] == $username && $valor['password'] == $password) {
                if (!isset($_SESSION['sesion'])) {

                    $_SESSION['sesion'] = [];
                }

                $_SESSION['sesion'] = [
                    'id' => $valor['id'],
                    'name' => $valor['name'],
                    'lastName' => $valor['lastName'],
                    'isAdmin' => $valor['isAdmin']
                ];
            }
        }
        if (!isset($_SESSION['sesion'])){
            return 'Credenciales no validas, intente otra vez.';
        }
    }
    public function getSesion(){
        return $_SESSION['sesion'];
    }


    public function getAll()
    {
        return $_SESSION['users'];
    }

    public function getById($id)
    {
        foreach ($_SESSION['users'] as $user) {
            if ($user['id'] == $id) {
                return $user;
            }
        }
    }
    
    public function editById($id, $username, $password, $name, $lastName, $email, $isAdmin)
    {
        foreach ($_SESSION['users'] as $index => $propiedad) {
            if ($propiedad['id'] == $id) {
                $_SESSION['users'][$index]['username'] = $username;
                $_SESSION['users'][$index]['password'] = $password;
                $_SESSION['users'][$index]['name'] = $name;
                $_SESSION['users'][$index]['lastName'] = $lastName;
                $_SESSION['users'][$index]['email'] = $email;
                $_SESSION['users'][$index]['isAdmin'] = $isAdmin;
            }
        }
    }
    public function deleteById($id)
    {
        foreach ($_SESSION['users'] as $index => $propiedad) {
            if ($propiedad['id'] == $id) {
                $_SESSION['users'][$index]['isActive'] = !$_SESSION['users'][$index]['isActive'];
                //unset($_SESSION['users'][$index]);
                //$_SESSION['users'] = array_values($_SESSION['users']);
                break;
            }
        }
    }
}
