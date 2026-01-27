<?php
require_once 'app/utils/auth.php';
require_once 'app/models/usuarioM.php';
require_once 'app/models/tareaM.php';

class indexC
{

    private $tareas;
    private $usuario;

    public function __construct()
    {
        $this->tareas = new tareaM();
        $this->usuario = new usuarioM();
    }

    public function registro()
    {
        require_once 'app/views/registro.php';
    }

    public function index()
    {
        auth::isAuth();
        require_once 'app/views/index.php';
    }

    public function login()
    {
        if (!isset($_SESSION['users'])) {
            echo "No se han creado usuarios";
            require_once 'app/views/login.php';
            return;
        } else {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            foreach ($this->usuario->getLista() as $user) {
                if ($username == $user['username'] && $password == $user['password']) {
                    $this->usuario->setSesion($user['id'], $user['name'], $user['apellido'], $user['isAdmin']);
                    $mostrarTareas = $this->tareas->mostrarTareas();
                    $resp = $this->usuario->datosUsuario();
                    require_once 'app/views/index.php';
                    return;
                }
            }
        }
        echo "credenciales no validas";
        require_once 'app/views/login.php';
    }

    public function create()
    {
        auth::isAuth();
        require_once 'app/views/create.php';
    }
}
