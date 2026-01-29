<?php
//PAPA
class Controllers{

     protected function view(string $view, array $data = [])
    {   
       
       extract($data);
       //require_once "../app/views/$view.php";
       $vista = "../app/views/$view.php";
       require_once "../app/views/index.php";
    }

     protected function model(string $model)
    {
        require_once "../app/models/$model.php";
        return new $model;
    }

    protected function redirect(string $path)
    {
        header("Location: /prueba/ejercicios/mvc/$path");
        exit;
    }
}
