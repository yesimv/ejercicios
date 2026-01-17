<?php
    class Evento{
        private $nombreEvento;
        private $participantes;

        public function __construct($nombreEvento,$participantes)
        {
            $this->nombreEvento = $nombreEvento;
            $this->participantes = $participantes;
            
        }

        //mostar participantes del evento
        public function getParticipantes(){
            foreach($this->participantes as $participante=>$atleta){
                echo "Participante " . $participante+1 .": " .$atleta->getNombre() ."</br>";
            }
        }

        public function getNombreEvento(){
            return $this->nombreEvento;
        }
        //se simula evento
        public function simularEvento(){
            $resultadoParticipacion = [];
           
            foreach($this->participantes as $participante=>$atleta){
                $puntaje = $atleta->participar();
                $resultadoParticipacion[] =  ['atleta'=>$atleta,'nombre'=>$atleta->getNombre(),'puntaje'=>$puntaje];
                //echo "Resultado del participante " . $participante+1 .": "  . $puntaje ."</br>";
            }
            // Ordenar del menor al mayor por resultado
            usort($resultadoParticipacion, function ($a, $b) {
                return $a['puntaje'] <=> $b['puntaje'];
            });
            
            //pendiente de investigar
            //otorga medallas acorde a los resultados
            foreach($resultadoParticipacion as $posicion => $resultado){
                if ($posicion === 0){
                    $resultado['atleta']->agregarMedalla("Oro");
                }elseif($posicion === 1){
                    $resultado['atleta']->agregarMedalla("Plata");
                }elseif($posicion === 2){
                    $resultado['atleta']->agregarMedalla("Bronce");
                }
            }
            return json_encode($resultadoParticipacion);

        }

        //obtener raking por pais
        public function ranking(){
            //por cada participante se pedira el dato de medallas ganadas y se ordenaran por las medallas optenidas en orden

            

            
        }

        
        

        //genera el ranking de paises basandose en las medallas obtenidas
}

class Atleta{
    private $nombre;
    private $pais;
    private $medallasGanadas = ["Oro"=>0,"Plata"=>0,"Bronce"=>0];

    public function __construct($nombre,$pais)
    {
        $this->nombre = $nombre;
        $this->pais = $pais;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getPais(){
        return $this->pais;
    }
    public function getMedallas(){
        return json_encode($this->medallasGanadas);
    }

    //pendiente de investigar
    public function agregarMedalla(string $tipo):void{
        if(array_key_exists($tipo,$this->medallasGanadas)){
            $this->medallasGanadas[$tipo]++;
        }
    }

    public function participar(){
        return mt_rand(0,100);
    }
}


$atleta1 = new Atleta("Jorge","Mexico");
$atleta2 = new Atleta("Maria", "España");
$atleta3 = new Atleta("Josh", "United States");
$atleta4 = new Atleta("Nie Li","China");
$atleta5 = new Atleta("Ingrid","Alemania");

$eventoAtletismo = new Evento("Atletismo",[$atleta1,$atleta2,$atleta3]);
echo $eventoAtletismo->getParticipantes();
echo $eventoAtletismo->simularEvento();
echo $eventoAtletismo->simularEvento();
echo $eventoAtletismo->simularEvento();
echo $eventoAtletismo->simularEvento();
echo $atleta1->getMedallas();
echo $atleta2->getMedallas();
echo $atleta3->getMedallas();
?>