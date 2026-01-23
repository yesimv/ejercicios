<?php
require_once 'app/models/pendienteM.php';

class indexC
{
    private $pendienteM;
    public function __construct()
    {
        $this->pendienteM = new pendienteM();
    }


    public function index()
    {

        /*  $this->pendienteM->nuevoPendiente('lavar','lavar el auto',FALSE);
        $this->pendienteM->nuevoPendiente('cocinar','preparar el desayuno',FALSE);
        $this->pendienteM->nuevoPendiente('limpiar','limpiar el patio',FALSE); */
        $mostrarLista1 = $this->mostrarLista();
        /*  $mostrarPendiente = $this->mostrarPendiente(1);
        $editarTitulo = json_encode($this->editarTitulo(1,'lavar a maasdsadno'));
        $mostrarPendiente2 = json_encode($this->mostrarPendiente(1));
        $eliminarPendiente = $this->eliminarPendiente(2);
        $mostrarLista2 = json_encode($this->mostrarLista());
        $this->pendienteM->nuevoPendiente('Empacar','limpiar el patio',FALSE);
        $mostrarLista3 = $this->mostrarLista(); */
        require_once 'app/views/index.php';
    }

    public function mostrarLista()
    {
        return $this->pendienteM->mostrarPendientes();
    }
    public function mostrarPendiente($id)
    {
        $id = $id;
        $resp = $this->pendienteM->mostrarPorId($id);
        require_once 'app/views/details.php';
    }
    public function editarTitulo($id, $titulo)
    {
        $llamado = $this->pendienteM->editarTitulo($id, $titulo);

        return $llamado;
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
        $this->pendienteM->nuevoPendiente('otra tarea', 'mas tareas', FALSE);
        $creacion = $this->mostrarLista();
        require_once 'app/views/ccreacion.php';
    }
    public function cdetails()
    {
        $this->editarTitulo(1, 'lavar a maasdsadno');
        $actualizacion = $this->mostrarLista();
        require_once 'app/views/cdetails.php';
    }
    public function delete()
    {
        require_once 'app/views/delete.php';
    }
}
