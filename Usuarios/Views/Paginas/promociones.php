<?php

$controlador = new Controlador();

$datosPromociones = array();

$datosPromociones = $controlador -> obtenerPromociones();

?>


<div class="col s12 mt-5 " id="pan" >
    <a href="index.php?pagina=inicio" class="breadcrumb"> Inicio </a>
    <a href="index.php?pagina=promociones" class="breadcrumb"> Promociones </a>
</div>

<div class="row">
    <h4> Promociones </h4>
</div>