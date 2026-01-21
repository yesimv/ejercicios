<?php
require_once './models/vehiculoM.php';


class vehiculoC {
    
    private $vehiculo;
    public function __construct($modelo,$marca,$anio,$color)
    {
        $this->vehiculo  = new vehiculoM($modelo,$marca,$anio,$color);
    }
    public function getDatos(){
        
        return $this->vehiculo->getDatos();
    }
    public function obtenerDatos(){
        $respuesta = json_encode($this->vehiculo->getDatos());
        return $this->respuesta(200,'success',$respuesta);
    }

    public function respuesta($status,$mensaje,$respuesta){
        return["status"=>$status,"mensaje"=>$mensaje,"respuesta"=>$respuesta];
    }


}
?>