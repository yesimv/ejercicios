<?php
//session_destroy();
session_start();

require_once 'app/controllers/indexC.php';
$index = new indexC();

$ruta = $_GET['action'] ?? 'login';
$id = $_GET['id']??null;

switch($ruta){
    case 'login': $index->login();
    break;
    case 'index': $index->index();
    break;
    case 'nuevo': $index->create();
    break;
    case 'ccreacion': $index->ccreacion();
    break;
    case 'details': $index->mostrarPendiente((int)$_GET['id']);
    break;
    case 'cdetails': $index->cdetails((int)$_GET['id']);
    break;
    case 'delete': $index->delete((int)$_GET['id']);
    break;
    case 'cerrar': $index->cerrarSesion();
    break;
    default : echo "Vista no encontrada";
    break;
}

?>