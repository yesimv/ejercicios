<?php
require_once './models/productoM.php';

class indexC{
    private $productoM;
    public function __construct()
    {
        $this->productoM = new producto();
    }
    public function indexInventario(){
        
       
        
        $listaProductos = $this->productoM->getAll();
        
        $id = $this->getById(2);
        $create = $this->createProducto("Bocinas",400);
        
        require_once './views/Inventario/index.php';
        
    }
    
    public function getById($valor){
        $producto = $$this->productoM ->getById($valor);
        return $producto;
    }
    public function createProducto($articulo,$precio){
        $respuesta = $this->productoM ->create($articulo,$precio); 
        return $this->productoM ->create($articulo,$precio);
    }
}

//estudia return en funciones dentro de clases
//como pasar un objeto instanciado a otra clase para usar sus funciones
//cuando usar return y cuando usar echo en mvc


?>