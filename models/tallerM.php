<?php


class tallerM{
    private $servicio ;
    private $horario ;
    private $registros;

    public function __construct($servicio,$horario)
    {
        $this->servicio = $servicio;
        $this->horario = $horario;
    }
    
    public function mostrarDisponibles(){
        $horas =[];
        foreach($this->horario as $hora=>$disp){
            if(!$disp){
                $horas[]= $hora ;
            }
        }
        return $horas;

    }

    public function getHorarios(){
        return $this->horario;
    }


    public function getRegistros(){
        return $this->registros;
    }

    public function registrar($hora,$servicio,$vehiculo){
        $this->registros[] = ['hora'=>$hora,'servicio'=>["descripcion"=>$servicio, 'precio'=>$this->servicio[$servicio]],'vehiculo'=>$vehiculo->getDatos()];
        $this->horario[$hora] = TRUE;
    }

    public function vaciarHora($hora){
    $this->horario[$hora] = FALSE;
    }
         

    public function corteCaja(){
        $total = 0;
        foreach( $this->registros as $valor){
            $total += $valor['servicio']['precio'];
        }
        return $total;
      
    }
}

?>