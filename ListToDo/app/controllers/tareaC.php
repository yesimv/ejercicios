<?php
require_once 'app/models/tareaM.php';


class tareaC
{
    
    private $tareas;

    
    
    public function __construct()
    {
        $this->tareas = new tareaM();

    }

    public function mostrarTareas()
    {
        return $this->tareas->mostrarTareas();
    }
    

    public function mostrarTarea($id)
    {
        auth::isAuth();
            $id = $id;
            $resp = $this->tareas->obtenerTareaPorId($id);
            $mostrarTareas = $this->tareas->mostrarTareas();
            $respU = $this->usuario->datosUsuario();
            require_once 'app/views/details.php';
        
    }

    public function editarTitulo($id, $titulo)
    {
        $this->tareas->editarTitulo($id, $titulo);
    }
    public function editarDescripcion($id, $descripcion)
    {
        $this->tareas->editarDescripcion($id, $descripcion);
    }

    public function eliminarTarea($id)
    {
        return $this->tareas->eliminarPorId($id);
    }

    public function create()
    {
        auth::isAuth();
            require_once 'app/views/create.php';
        
    }

    public function confirmarCreacionTarea()
    {
        auth::isAuth();
            $isAdmin = isAdmin();
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $this->tareas->nuevaTarea($titulo, $descripcion, FALSE);
            //$mostrarLista = $this->mostrarTareas();
            //$id = idUsuario();
            
            $mostrarTareas = mostrarTareas();
            $idUsuario = idUsuario();
            
            $nombreCompleto = getSesionName();
            echo 'Tarea Creada';
            require_once 'app/views/index.php';
        
    }

    public function confirmarDetallesTarea($id)
    {
        auth::isAuth();
            $id = $id;
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $this->tareas->editarTitulo($id, $titulo);
            $mostrarTareas = $this->mostrarTareas();
            $isAdmin = isAdmin();
            $idUsuario = idUsuario();
            $nombreCompleto = getSesionName(); 
            echo 'Tarea Actualizada';
            require_once 'app/views/index.php';
        
        
    }
    public function deleteTarea($id)
    {
        auth::isAuth();  
            $id = $id;
            $isAdmin = isAdmin();
            $eliminarTarea = $this->eliminarTarea($id);
            $mostrarTareas = $this->mostrarTareas();
            $idUsuario = idUsuario();
            $nombreCompleto = getSesionName();
            echo 'Tarea eliminada';
            require_once 'app/views/index.php';
        
    }
    public function changeEstado($id)
    {
        auth::isAuth();  
            $id = $id;
            $isAdmin =
             isAdmin();


            $cambiarEstado = $this->cambiarEstado($id);
            $mostrarTareas = mostrarTareas();
            $nombreCompleto = getSesionName();
            $idUsuario = idUsuario();
            echo 'Tarea eliminada';
            require_once 'app/views/index.php';
        
    }
    public function cambiarEstado($id)
    {
        return $this->tareas->cambiarEstado($id);
    }

}
