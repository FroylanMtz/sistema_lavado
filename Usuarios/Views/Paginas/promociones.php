<?php

$controlador = new Controlador();

$datosPromociones = array();

$datosPromociones = $controlador -> obtenerPromociones();

$colores = array('red lighten-2', 'purple lighten-2', 'deep-purple lighten-2', 'indigo lighten-2');


?>


<div class="col s12 mt-5 " id="pan" >
    <a href="index.php?pagina=inicio" class="breadcrumb"> Inicio </a>
    <a href="index.php?pagina=promociones" class="breadcrumb"> Promociones </a>
</div>

<div class="row">
    <h4> Promociones </h4>
</div>

<?php

//Se despiegan los premios disponibles o canjeados por el usuario del cupon, pero ademas se muestra un mensaje dependiendo del permio, es decir, si el usuario ya cambio el permio, si esta disponible para el canje o si le faltan algunas visitas para obtenerlo y si es asi indica el numero de visitas necesarias faltantes para conseguir dicho premio
for($i = 0; $i < count($datosPromociones); $i++){

    echo '<div class="row">
            <div class="col s12 m12">';
     
    echo '       <div class="card '. $colores[rand(0,3)] .'hoverable"> ';
    
    echo '            <div class="card-content white-text">
    
        <h4> <center> Promocion '. $datosPromociones[$i]['promocion_id'] .' </center> </h4>

        <center> <img src="Public/img/promocion.png" alt="" width="100px" height="100px"> </center>
        

        <span class="black-text text-darken-2"> <b> <h4> <center> '. $datosPromociones[$i]['nombrePromocion'] .' </center> </h4> </b> </span>
        
        <h6> <center> '. $datosPromociones[$i]['descripcion'] .'</center> </h6>

        </span>';
        
    echo '    </div>

                    </div>
                </div>
            </div>';

}

?>