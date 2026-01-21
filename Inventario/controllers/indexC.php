<?php
require_once './models/productoM.php';

class indexC{
    
    public function indexInventario(){
        $productoM = new producto();
       
        
        $listaProductos = $productoM->getAll();
        
        $id = $this->getById(2,$productoM );
        $create = $this->createProducto("Bocinas",400,$productoM);
        
        require_once './views/Inventario/index.php';
        
    }
    
    public function getById($valor,$objeto){
        $producto = $objeto->getById($valor);
        return $producto;
    }
    public function createProducto($articulo,$precio,$objeto){
        $respuesta = $objeto->create($articulo,$precio); 
        return $objeto->create($articulo,$precio);
    }
}

//estudia return en funciones dentro de clases
//como pasar un objeto instanciado a otra clase para usar sus funciones
//cuando usar return y cuando usar echo en mvc


?>