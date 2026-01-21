<?php

require_once './controllers/tallerC.php';
require_once './controllers/vehiculoC.php';
 
$controllerT = new tallerC();
$controllerV1 = new vehiculoC("CR-V","Honda","2010","Rojo");
$controllerV2 = new vehiculoC("Modelo Y","Tesla","2015","Negro");
$controllerV3 = new vehiculoC("Corolla","Toyota","2010","Plata");
$controllerV4 = new vehiculoC("RAV4","Toyota","2022","Blanco");
$controllerV5 = new vehiculoC("F-Series","Ford","2008","Azul");
$controllerV6 = new vehiculoC("Song","BYD","2024","Plata");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3><?php echo $controllerV1->obtenerDatos()["respuesta"] ?></h3>
    <h3><?php echo json_encode($controllerT->getHorarios()["respuesta"]) ?></h3>
    <h3><?php echo $controllerT->mostrarDisponibles()["respuesta"] ?></h3>
    <h3><?php echo $controllerT->ingresarVehiculo('9am','Lavado',$controllerV1)["respuesta"] ?></h3>
    <h3><?php echo $controllerT->ingresarVehiculo('9am','Lavado',$controllerV2)["respuesta"] ?></h3>
    <h3><?php echo $controllerT->ingresarVehiculo('10am','CambioAceite',$controllerV3)["respuesta"] ?></h3>
    <h3><?php echo $controllerT->ingresarVehiculo('11am','Frenos',$controllerV4)["respuesta"] ?></h3>
    <h3><?php echo $controllerT->ingresarVehiculo('1pm','CambioAceite',$controllerV2)["respuesta"] ?></h3> 
    
    <h3><?php echo $controllerT->getRegistros()["respuesta"] ?></h3>
    <h3><?php echo $controllerT->mostrarDisponibles()["respuesta"] ?></h3>
    <h3><?php echo $controllerT->vaciarHora('9am')["respuesta"] ?></h3>
    <h3><?php echo $controllerT->mostrarDisponibles()["respuesta"] ?></h3>
    <h3><?php echo json_encode($controllerT->getHorarios()["respuesta"]) ?></h3>
    <h3><?php echo $controllerT->corteCaja()["respuesta"] ?></h3>
</body>
</html>