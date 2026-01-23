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

        $todos = $this->getPendientes();
        $pendiente = $this->getById(1);
        $tituloEditado = $this->editTitulo(1, 'Lavar con manguera');
        $pendienteEliminado = $this->eliminarPorId(1);
        require_once 'app/views/index.php';
    }

    public function getPendientes()
    {
        return $this->pendienteM->getAll();
    }

    public function getById($id)
    {
        return $this->pendienteM->getById($id);
    }
    public function editTitulo($id, $nTitulo)
    {
        $this->pendienteM->editTitulo($id, $nTitulo);
        return  json_encode($this->getById($id));
    }
    public function eliminarPorId($id)
    {
        $this->pendienteM->deleteById($id);
        return  json_encode($this->getPendientes());
    }
}
