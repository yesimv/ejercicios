<?php
require_once 'app/controllers/indexC.php';
$index = new indexC();

$ruta = $_GET['action'] ?? 'index';
$id = $_GET['id']??null;

switch($ruta){
    case 'index': $index->index();
    break;
    case 'nuevo': $index->create();
    break;
    case 'ccreacion': $index->ccreacion();
    break;
    case 'details': $index->mostrarPendiente((int)$_GET['id']);
    break;
    case 'cdetails': $index->cdetails();
    break;
    case 'delete': $index->delete();
    break;
    default : echo "Vista no encontrada";
    break;
}

?>