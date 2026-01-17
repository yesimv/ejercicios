<?php
class usuarioCajero
{
    private $nombre;
    private $saldo;
    public $contadorMovimiento;
    public $accion;

    public function __construct($nombre, $saldo)
    {
        $this->nombre = $nombre;
        $this->saldo = $saldo;
    }


    public function consultarDatos($posicion)
    {
        $datos = [$this->nombre, $this->saldo];
        return $datos[$posicion];
    }


    public function deposito($cantidad)
    {
        
        if ($cantidad > $this->saldo || $cantidad <= 0) {
            echo $this->ticket("error",$cantidad);
        } else {
            
            $this->saldo = $this->saldo + $cantidad;
            $this->movimientos(); 
            $this->accion[] = "deposito";
            echo $this->ticket("deposito",$cantidad);
            
        }
    }

    public function retiro($cantidad)
    {
        
        if ($cantidad > $this->saldo || $cantidad <= 0) {
                echo $this->ticket("error",$cantidad);
        } else {
            
            $this->saldo = $this->saldo - $cantidad;
            $this->movimientos(); 
            $this->accion[] = "retiro";
            echo $this->ticket("retiro",$cantidad);

            
            
        }
        
    }
    public function ticket($tipo, $cantidad){
        $movimiento="";
        $actual=$this->saldo;

        if($tipo == "error"){
            $movimiento=
            "<h3>Error de transaccion </h3>".
            "Valor ingresado: ".$cantidad.
            "</br> Saldo:".$this->saldo.
            "<hr>";
        }else{
        if($tipo == "retiro"){
            $actual+= $cantidad;
            $movimiento=
            "<h3>Retiro exitoso!</h3>";
        } else{
            $actual-= $cantidad;
            $movimiento=
            "<h3>Deposito exitoso! </h3>";
        }
        $movimiento=$movimiento."Saldo actual: ".$actual.
            "</br>Valor ingresado: ".$cantidad.
            "</br> Saldo final:".$this->saldo.
            "<hr>";
            
        }
        

        return $movimiento;
    }

    public function movimientos(){
        $this->contadorMovimiento ++ ;
        return $this->contadorMovimiento;

    }

    public function obtenerAccion(){
        return "Movimientos: " . $this->contadorMovimiento ."</br> Acciones: ". json_encode($this->accion);
    }

}

$usuario = new usuarioCajero("Carlos", 3000);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cajero</title>
</head>

<body>
    <h2>Cajero</h2>
    <p>Bienvenido: <?php echo $usuario->consultarDatos(0) ?></p>

    <hr>

    <h3>Consulta de saldo</h3>
    <p>Tu saldo actual es de: <?php echo $usuario->consultarDatos(1) ?></p>

    <hr>

    <?php
        $usuario->retiro(500);
       

        
        echo $usuario->retiro(300);
        echo $usuario->deposito(500);
        echo $usuario->retiro(300);
        echo $usuario->deposito(500);
        echo $usuario->retiro(300);
        echo $usuario->deposito(500);
        echo $usuario->retiro(300);
        echo $usuario->deposito(-500);
        echo $usuario->retiro(-300);
   ?>
   <?php echo $usuario->obtenerAccion() ?>

</body>

</html>
