<?php
class Usuario{
    private $nombre;
    private $edad;

    public function __construct($nombre,$edad)
    {
        $this->nombre = $nombre ;
        $this->edad = $edad;
    }
    

    public function saludar(){
        $saludo = "Hola me llamo " . $this->nombre . ".<br/>". $this->getEdad() . "<br/>". $this->esMayordeEdad();
        return $saludo;
        
    }
    public function getEdad(){
        $edadUsuario = "Tengo " . $this->edad . " años.";
        return $edadUsuario;
    }
    public function esMayordeEdad(){
        
        if($this->edad >= 18){
            $esMayor = "Soy mayor de edad.";
        }else{
            $esMayor = "Soy menor de edad.";
        }
        return $esMayor;
    }
    
}

$usuario = new Usuario("Jorge",17);
$saludoUsuario = $usuario->saludar();

echo $saludoUsuario;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del usuario</title>
</head>
<body>
    <h1>Perfil del usuario</h1>
    <p id="nombre">Nombre: </p>
    <p id="edad">Edad: </p>
    <p id="estado">Estado: </p>
</body>
</html>