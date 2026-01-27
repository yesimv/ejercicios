<?php

require_once 'app/utils/rutas-controllers.php';

auth::sessionIniciada();

$index = new indexC();
$usuario = new usuarioC();
$tarea = new tareaC();

$ruta = $_GET['action'] ?? 'login';
$id = $_GET['id']??null;

switch($ruta){
    case 'registro': $index->registro();
    break;
    case 'nuevoRegistro': $usuario->nuevoRegistro();
    break;
    case 'login': $index->login();
    break;
    case 'index': $index->index();
    break;
    case 'nuevo': $index->create();
    break;
    case 'ccreacion': $tarea->confirmarCreacionTarea();
    break;
    case 'details': $tarea->mostrarTarea((int)$_GET['id']);
    break;
    case 'cdetails': $tarea->confirmarDetallesTarea((int)$_GET['id']);
    break;
    case 'delete': $tarea->deleteTarea((int)$_GET['id']);
    break;
    case 'cambiarE': $tarea->changeEstado((int)$_GET['id']);
    break;
    case 'cerrar': auth::closeSession();
    break;
    default : echo "Vista no encontrada";
    break;
}

?>