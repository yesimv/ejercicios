<?php
require_once 'app/controls/indexC.php';
$index = new indexC();
$index->index();

$ruta = $_GET('action') ?? 'index';
$id = $_GET('id') ?? null;

switch ($ruta) {
    case 'index':
        $index->index();
        break;
}
