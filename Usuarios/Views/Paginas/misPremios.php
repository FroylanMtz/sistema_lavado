<?php

$controlador = new Controlador();

$datosPremios = array();

$datosPremios = $controlador -> obtenerMisPremios();

?>

<div class="col s12 mt-5 " id="pan" >
    <a href="index.php?pagina=inicio" class="breadcrumb"> Inicio </a>
    <a href="index.php?pagina=misPremios" class="breadcrumb"> Mis premios</a>
</div>

<div class="row">
    <h4> Mis premios</h4>
</div>

<div class="row">
    <center> <span class="green-text"> <h5> Premios disponibles para canje </h5> </span> </center>
    <hr>
<div>

<?php
    for($i = 0; $i < count($datosPremios); $i++){
        if($datosPremios[$i]['canjeable'] == 'Si' ){
            
            echo '<div class="row">
                <div class="col s12 m12">
                    <div class="card light-green lighten-2 hoverable">
                        <div class="card-content white-text">
            
            
            <span class="green-text"> <b> Estado: Disponible para canje </b> </span>

            <h4> <center> Premio '. $datosPremios[$i]['premio_id'] .' </center> </h4>
             

            <center> <img   src="Public/img/coupon.png" alt="" width="100px" height="100px"> </center>

            <span class="black-text text-darken-2"> <b> <h4> <center> '. $datosPremios[$i]['nombrePremio'] .' </center> </h4> </b> </span>
            
            <h6> <center> '. $datosPremios[$i]['descripcion'] .'</center> </h6>

                        </div>
                    </div>
                </div>';

        }
    }

    
?>
    <div class="section"></div>
    <div class="section"></div>
    <div class="section"></div>
    <div class="section"></div>
    <div class="section"></div>
    <div class="section"></div>
    <div class="section"></div>

    <div class="row">
        <center> <span class="red-text"> <h5> Premios canjeados </h5> </span> </center>
        <hr>
    <div>

<?php
    for($i = 0; $i < count($datosPremios); $i++){
        if($datosPremios[$i]['canjeable'] == 'No' ){
            

            echo '<div class="row">
                <div class="col s12 m12">
                    <div class="card grey hoverable">
                        <div class="card-content white-text">
            
                        
            
            <span class="red-text"> <b> Estado: Canjeado  </b> </span>

            <h4> <center> Premio '. $datosPremios[$i]['premio_id'] .' </center> </h4>
            

            <center> <img src="Public/img/coupon.png" alt="" width="100px" height="100px"> </center>
            
            <span class="black-text text-darken-2"> <b> <h4> <center> '. $datosPremios[$i]['nombrePremio'] .' </center> </h4> </b> </span>
            
            <h6> <center> '. $datosPremios[$i]['descripcion'] .'</center> </h6>

                        </div>
                    </div>
                </div>';

        }
    }

?>
