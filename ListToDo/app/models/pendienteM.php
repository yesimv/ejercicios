<?php
class pendienteM{
   
    private $lista = [
        [
            'id' => 1,
            'titulo' => 'lavar',
            'descripcion' => 'lavar el auto',
            'estaFinalizada' => false
        ],
        [
            'id' => 2,
            'titulo' => 'cocinar',
            'descripcion' => 'preparar el desayuno',
            'estaFinalizada' => false
        ],
        [
            'id' => 3,
            'titulo' => 'limpiar',
            'descripcion' => 'limpiar el patio',
            'estaFinalizada' => false
        ]
    ];

    private $id = 0;

    public function nuevoPendiente($titulo,$descripcion,$estado){
        
        $id = $this->id++;        
      
        $this->lista[]= [
            'id' => $id+1,
            'titulo' => $titulo,
            'descripcion' => $descripcion,
            'estaFinalizada' => $estado
        ];

         return;
    }
    
    public function mostrarPorId($id){
        
        foreach($this->lista as $propiedad){
            if($propiedad['id'] === $id){
                return $propiedad;
            }
        }
        return null;
    }
    public function editarTitulo($id,$nuevoValor){
           foreach($this->lista as $index => $elemento ){
            if($elemento['id'] == $id){
                $this->lista[$index]['titulo'] = $nuevoValor;
               return  $this->lista;

            }else{
                return false;
            }
        }
        
    }
    public function eliminarPorId($id){
        foreach($this->lista as $index => $elemento){
            if($elemento['id'] == $id){
                unset($this->lista[$index]);
                $this->lista = array_values($this->lista);
                break;
            }
        }
    }

    public function mostrarPendientes(){    
        return $this->lista;

    }

}
?>