<?php

//Esta pagina concetra todo el sistema en si, es la base es el punto reunion del controlaor, del modelo, de la paltnailla que le da estilo y del crud
require_once 'Modells/Modelo.php';
require_once 'Modells/CRUD.php';
require_once 'Controllers/Controlador.php';


$controlador = new Controlador();

$controlador->cargarPlantilla();

?>