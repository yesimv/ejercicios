<?php

require_once './models/tallerM.php';
require_once './utils/constants.php';
class tallerC{
    
   private $taller;
   public function __construct(){
    $this->taller = new tallerM(['CambioAceite'=>400,'Frenos'=>800,'Lavado'=>150],['9am'=>FALSE,'10am'=>FALSE,'11am'=>FALSE,'12pm'=>FALSE,'1pm'=>FALSE,'2pm'=>FALSE,'3pm'=>FALSE,'4pm'=>FALSE]);
   }
   
    public function getHorarios(){
        $respuesta = $this->respuesta(200,"success",$this->taller->getHorarios());
       return $respuesta;
        //echo json_encode(constants::SERVICIOS);
        //echo json_encode($this->taller->getHorarios());
    }

    public function mostrarDisponibles(){
        
        $disponibles = $this->taller->mostrarDisponibles();
        $respuesta = '</br>Horas disponibles:</br>'. json_encode($disponibles);
        return $this->respuesta(200,'success',$respuesta);
    }
    public function getRegistros(){
        $respuesta = 'Todos los registros del dia: </br>'. json_encode($this->taller->getRegistros());
        return $this->respuesta(200,'success',$respuesta);
    }
    public function ingresarVehiculo($hora,$servicio,$vehiculo){
        $respuesta='';
        $horario = $this->taller->getHorarios();
        if($horario[$hora] === FALSE){
            $this->taller->registrar($hora,$servicio,$vehiculo);
            
            $respuesta = "</br>Registro exitoso";
            $horario[$hora] = TRUE;
        }elseif($horario[$hora] === TRUE){
            $respuesta = "</br>Hora no disponible".$this->mostrarDisponibles()['respuesta'];
            
        }else{
            $respuesta = "</br>Error de registro";
        }
        return $this->respuesta(200,'success',$respuesta);
    }

    public function vaciarHora($hora){
        $respuesta = '';
        $horario = $this->taller->getHorarios();
        if($horario[$hora] === TRUE){
            $this->taller->vaciarHora($hora);
            $respuesta = 'Se finalizo el servicio exitosamente!'; 
                       
        }else{
            $respuesta ='Actualmente no hay vehiculo registado en esta hora.';
        }
        return $this->respuesta(200,"success",$respuesta);
        
        

    }
    public function corteCaja(){
        $respuesta = 'Ganancia total: '.$this->taller->corteCaja() ;
        return $this->respuesta(200,"success",$respuesta);
    }

    public function respuesta($status,$mensaje,$respuesta){
        return["status"=>$status,"mensaje"=>$mensaje,"respuesta"=>$respuesta];
    }

}
?>