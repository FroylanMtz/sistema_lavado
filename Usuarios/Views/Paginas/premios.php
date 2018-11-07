<?php

$controlador = new Controlador();

$datosPremios = array();

$datosPremios = $controlador -> obtenerPremios();

$datosVisitas = array();

$datosVisitas = $controlador -> obtenerVisitas();

$totalVisitas = count($datosVisitas);

?>


<div class="col s12 mt-5 " id="pan" >
    <a href="index.php?pagina=inicio" class="breadcrumb"> Inicio </a>
    <a href="index.php?pagina=premios" class="breadcrumb"> Premios disponibles </a>
</div>

<div class="row">
    <h4> Premios disponibles </h4>
</div>

<label style='float: right;'>
    <span class='pink-text' href='#!'> <h5> <b>Tus visitas: <?= $totalVisitas ?> </b> </h5> </span>
</label>

<?php
    for($i = 0; $i < count($datosPremios); $i++){

        echo '<div class="row">
                <div class="col s12 m12">
                    <div class="card blue hoverable">
                        <div class="card-content white-text">
            
                        
            <h4> <center> Premio '. $datosPremios[$i]['premio_id'] .' </center> </h4>

            <center> <img src="Public/img/regalo.png" alt="" width="100px" height="100px"> </center>
            

            <span class="black-text text-darken-2"> <b> <h4> <center> '. $datosPremios[$i]['nombrePremio'] .' </center> </h4> </b> </span>
            
            <h6> <center> '. $datosPremios[$i]['descripcion'] .'</center> </h6>

            <span class="black-text text-darken-2"> <center> <h5> Visitas requeridas </h5> </center> </span>
            
            <span class="pink-text"> <center> <h4> '. $datosPremios[$i]['visitasRequeridas'] .' </h4> </center> </span>
            </div>
                        </div>
                    </div>
                </div>';
                



    }

?>