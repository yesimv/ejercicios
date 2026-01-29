<?php

require_once '../core/rutas.php';
require_once '../core/constants.php';
require_once '../core/Auth.php';

Auth::sessionStart();
$router = new rutas();
