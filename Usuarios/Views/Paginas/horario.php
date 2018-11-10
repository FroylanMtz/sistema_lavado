<?php

//Se crea un controlador 
$controlador = new Controlador();

//Se crea una variable para almacenar los datos traidos por el controladors
//los datos son los datos de los horarios definidos por el administrador
$datosHorarios = array();

//Se llena el arreglo con los datos ofrecidos por el controlador y este a su vez son providos por el modelo que se conecta con la base de datos
$datosHorarios = $controlador -> obtenerHorario();

?>
<!--Pagina que muestra el horario de servicio y los dias del establecimiento -->

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
                
                <!--Los horarios son desplegados con informacion dinamica en esta parte donde son leidos de la base de datos y puestos en el arreglo el cual se despliega a continuacion: -->
                <h4> Lunes a Viernes: </h4>
                <h4> <center>  <?= $datosHorarios[0]['horario'] ?> </center> </h4>
                <h4> Sabado y Domingo: </h4>
                <h4> <center> <?= $datosHorarios[1]['horario'] ?> </center> </h4>
            </div>

        </div>
    </div>
</div>
         