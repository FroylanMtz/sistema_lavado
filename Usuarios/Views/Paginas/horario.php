<?php

$controlador = new Controlador();

$datosHorarios = array();

$datosHorarios = $controlador -> obtenerHorario();

?>

<div class="col s12 mt-5" id="pan" >
    <a data-target="mobile-demo" class="breadcrumb sidenav-trigger"> Menú </a>
    <a href="index.php?pagina=horario" class="breadcrumb"> Horario </a>
</div>

<div class="row">
    <h4> Horario de servicio </h4>
</div>

<div class="row">
    <div class="col s12 m12">
        <div class="card blue darken-4">
                <div class="card-content white-text">
                
                <!--<span class="card-title"> Lunes a Viernes </span>-->
                <h4> Lunes a Viernes: </h4>
                <h4> <center>  <?= $datosHorarios[0]['horario'] ?> </center> </h4>
                <h4> Sabado y Domingo: </h4>
                <h4> <center> <?= $datosHorarios[1]['horario'] ?> </center> </h4>
            </div>

        </div>
    </div>
</div>
         