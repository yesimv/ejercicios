<?php
class vehiculoM {
    private $modelo;
    private $marca;
    private $anio;
    private $color;
    


    public function __construct($modelo,$marca,$anio,$color)
    {
        $this->modelo = $modelo;
        $this->marca = $marca;
        $this->anio = $anio;
        $this->color = $color;
    }
    
    public function getDatos(){
        return [$this->modelo,$this->marca,$this->anio,$this->color];
    }


}
?>