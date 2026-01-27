<?php

echo 'aqui entro a index';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
</head>
<body>
        <h1>Inventario</h1>
        <p>Bienvenido a Inventario S.A. de C.V.</p>

        <h3>Productos al inicio del dia</h3>
        <?php foreach($listaProductos as $elemento){
                echo "</br>Numero ID: ".$elemento['id'] . "</br>Nombre del articulo: ".$elemento['articulo']. '</br>Precio: '.$elemento['precio'].'</br>';
            } ?>

        <h3>Producto con ID 3</h3>
        <?php echo json_encode($id); ?>

        <h3>Producto agregado</h3>

        <?php 

            foreach($create as $elemento){
                echo "</br>Numero ID: ".$elemento['id'] . "</br>Nombre del articulo: ".$elemento['articulo']. '</br>Precio: '.$elemento['precio'].'</br>';
            }
        
        ?>
        
        <?php //echo json_encode($listaProductos); ?>
</body>
</html>