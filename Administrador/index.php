<?php

require_once 'Modells/Modelo1.php';
require_once 'Modells/Modelo2.php';
require_once 'Modells/CRUD1.php';
require_once 'Modells/CRUD2.php';
require_once 'Controllers/Controlador1.php';
require_once 'Controllers/Controlador2.php';


$controlador = new Controlador1();

$controlador->cargarPlantilla();

?>