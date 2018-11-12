<?php

$controlador = new Controlador();

$datosPremios = array();

$datosPremios = $controlador -> obtenerMisPremios();

?>

<!--Pagina en la cual se muestran los premios disponibles para el canje o tambien los que ya se han canjeado con anterioridad-->

<div class="col s12 mt-5 " id="pan" >
    <a href="index.php?pagina=inicio" class="breadcrumb"> Inicio </a>
    <a href="index.php?pagina=misPremios" class="breadcrumb"> Mis premios</a>
</div>

<!--Titulo de la pagina-->
<div class="row">
    <h4> Mis premios</h4>
</div>

<div class="row">
    <center> <span class="green-text"> <h5> Premios disponibles para canje </h5> </span> </center>
    <hr>
<div>

<?php
    //Con este for se recorren todos los premios disponibles y se compara si el campo que indica si es canjeable esta en si, para ponerle un mensaje concorde a la tarjeta, y de igual forma un color que represente esto como el color verde
    for($i = 0; $i < count($datosPremios); $i++){
        if($datosPremios[$i]['canjeable'] == 'SI' || $datosPremios[$i]['canjeable'] == 'SI' ){
            
            echo '<div class="row">
                <div class="col s12 m12">
                    <div class="card light-green lighten-2 hoverable">
                        <div class="card-content white-text">
            
            
            <span class="green-text"> <b> Estado: Disponible para canje </b> </span>

            <h4> <center> Premio '. $datosPremios[$i]['premio_id'] .' </center> </h4>
             

            <center> <img   src="Public/img/discount.png" alt="" width="100px" height="100px"> </center>

            <span class="black-text text-darken-2"> <b> <h4> <center> '. $datosPremios[$i]['nombrePremio'] .' </center> </h4> </b> </span>
            
            <h6> <center> '. $datosPremios[$i]['descripcion'] .'</center> </h6>

                        </div>
                    </div>
                </div>';

        }
    }

    
?>
    <div class="section"></div>
    <div class="row">
        <center> <span class="red-text"> <h5> Premios canjeados </h5> </span> </center>
        <hr>
    <div>

<?php
    //En este otro for se muestran todos los premios ya canjeados, la diferencia es que aqui se muestran los que tengan el campo que indica si el boleto es canejable en NO
    for($i = 0; $i < count($datosPremios); $i++){
        if($datosPremios[$i]['canjeable'] == 'No' || $datosPremios[$i]['canjeable'] == 'no' ){
            

            echo '<div class="row">
                <div class="col s12 m12">
                    <div class="card grey hoverable">
                        <div class="card-content white-text">
            
                        
            
            <span class="red-text"> <b> Estado: Canjeado  </b> </span>

            <!--Se coloca dinamicamente el id del permio como titulo de la tarjeta-->
            <h4> <center> Premio '. $datosPremios[$i]['premio_id'] .' </center> </h4>
            

            <center> <img src="Public/img/coupon.png" alt="" width="100px" height="100px"> </center>
            
            <!--y de igual forma el nombre y descripcion de dicho premio-->

            <span class="black-text text-darken-2"> <b> <h4> <center> '. $datosPremios[$i]['nombrePremio'] .' </center> </h4> </b> </span>
            
            <h6> <center> '. $datosPremios[$i]['descripcion'] .'</center> </h6>

                        </div>
                    </div>
                </div>';

        }
    }

?>
