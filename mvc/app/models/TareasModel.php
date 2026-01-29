<?php

class TareasModel{
    public function create($title,$notes){
        if(!isset($_SESSION['tareas'])){
            $_SESSION['tareas'] = [];
        }
        if(!isset($_SESSION['tareas_id'])){
            $_SESSION['tareas_id'] = 1;
        }
        $_SESSION['tareas'][] =[
            'id'=>$_SESSION['tareas_id'],
            'userId'=>$_SESSION['sesion']['id'],
            'title'=>$title,
            'notes'=>$notes,
            'isPending'=>TRUE
        ];
        $_SESSION['tareas_id']++;
    }
    public function getAll(){
        return $_SESSION['tareas'];
    }
    public function getById($id){
        foreach($_SESSION['tareas'] as $tarea){
            if($tarea['id'] == $id){
                return $tarea;
            }
        }
    }
    public function editById($id,$title,$notes){
        
        foreach($_SESSION['tareas'] as $index => $propiedad){
            if($propiedad['id']==$id){
                $_SESSION['tareas'][$index]['title']=$title;
                $_SESSION['tareas'][$index]['notes']=$notes;
                
                
            }
        }
    }
    public function deleteById($id){
        foreach($_SESSION['tareas'] as $index=>$propiedad){
            if($propiedad['id']==$id){
                unset($_SESSION['tareas'][$index]);
                $_SESSION['tareas'] = array_values($_SESSION['tareas']);
                break;
            }
        }
    }
    public function changeStatus($id){
        foreach($_SESSION['tareas'] as $index => $propiedad){
            if($propiedad['id']==$id){
                
                $_SESSION['tareas'][$index]['isPending'] = !$_SESSION['tareas'][$index]['isPending'];
            
            }
        }
    }
}