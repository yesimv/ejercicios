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
    public function edad(){
        
        return $this->edad;
    }
    public function nombre(){
        $nombre = $this->nombre;
        return $nombre;
    }
    public function getPerfil($posicion){
       
        $arrayPerfil = [$this->nombre, $this->edad, $this->esMayordeEdad()];

        return $arrayPerfil[$posicion];
    }

    public function getPerfilPropiedad($propiedad){
        $arrayPerfil = ["nombre"=> $this->nombre,"edad"=> $this->edad, "estado"=>$this->esMayordeEdad()];

        return $arrayPerfil[$propiedad];
    }
    
}

$usuario = new Usuario("Jorge",17);
$saludoUsuario = $usuario->saludar();

echo $saludoUsuario;
 
$hola =$usuario->edad()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
    <h1>Perfil del usuario</h1>
    <p>Nombre: <?php  echo $usuario->getPerfil(0)?></p>
    <p>Edad: <?php  echo $usuario->getPerfil(1)?></p>
    <p>Estado: <?php  echo $usuario->getPerfil(2)?></p>

</br>
    <h1>Obtencion de datos pro piedad</h1>
    <p>Nombre: <?php  echo $usuario->getPerfilPropiedad("nombre")?></p>
    <p>Edad: <?php  echo $usuario->getPerfilPropiedad("edad")?></p>
    <p>Estado: <?php  echo $usuario->getPerfilPropiedad("estado")?></p>

</body>
</html>
