<?php

class producto{

private $articulos;

public function __construct()
{
   
    $this->articulos = $this->getAll();
 
}


 public function getAll(){
   
    $bd = [
        ['id'=>1,'articulo'=>"Monitor",'precio'=>3000],
        ['id'=>2,'articulo'=>"Teclado",'precio'=>300],
        ['id'=>3,'articulo'=>"Mouse",'precio'=>100]

    ];
    return $bd;
 }
 public function getById($id){
    $bd = $this->articulos;
    foreach($bd as $elemento){
        if($id === $elemento['id']){
        return $elemento;
        }
    }
    return 'Id no encontrado';
    
 }
 public function create($articulo,$precio){
    $bd = $this->articulos;
    $nextId= end($bd);
    $bd[]=['id'=>$nextId['id']+1,'articulo'=>$articulo,'precio'=>$precio];
    return $bd; 
 }
}
?>