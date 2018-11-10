<?php

//Se instancia un objeto de la clase controlador
$controlador = new Controlador();

//Se declara un arreglo para almacenar los datos traidos por el controlador acerca de los permios disponibles del cupon
$datosPremios = array();

//Se carga dicho arreglo con los datos traidos por la funcion obtenerPremios()
$datosPremios = $controlador -> obtenerPremios();

//Se declara un arreglo para guardar los datos de las visitas
$datosVisitas = array();

//Se llena el arreglo con los datos de las visitas traidos desde el controladro y este por el modelo
$datosVisitas = $controlador -> obtenerVisitas();

//Se cuenta el total de las visitas para alamcenarlas como numero en la variable #totalVisitas
$totalVisitas = count($datosVisitas);

//Se declara un arreglo para almacenar los datos de los premios disponibles o ya cajeados por el usuario
$premiosDisponibles = array();

//Se rellena con los datos desde l base de datos, estos datos son los datos de la tabla intermedia entre cupones y premios
$premiosDisponibles = $controlador -> obtenerMisPremios();
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

    //Se despiegan los premios disponibles o canjeados por el usuario del cupon, pero ademas se muestra un mensaje dependiendo del permio, es decir, si el usuario ya cambio el permio, si esta disponible para el canje o si le faltan algunas visitas para obtenerlo y si es asi indica el numero de visitas necesarias faltantes para conseguir dicho premio
    for($i = 0; $i < count($datosPremios); $i++){

        echo '<div class="row">
                <div class="col s12 m12">
                    <div class="card  blue lighten-2 hoverable">
                        <div class="card-content white-text">
        
            <h4> <center> Premio '. $datosPremios[$i]['premio_id'] .' </center> </h4>

            <center> <img src="Public/img/regalo.png" alt="" width="100px" height="100px"> </center>
            

            <span class="black-text text-darken-2"> <b> <h4> <center> '. $datosPremios[$i]['nombrePremio'] .' </center> </h4> </b> </span>
            
            <h6> <center> '. $datosPremios[$i]['descripcion'] .'</center> </h6>

            </span>';
            

        if( ($datosPremios[$i]['visitasRequeridas'] - $totalVisitas  )<= 0){
            
            for($j=0; $j < count($premiosDisponibles); $j++ ){

                if($datosPremios[$i]['premio_id'] == $premiosDisponibles[$j]['premio_id'] ){

                    if($premiosDisponibles[$j]['canjeable'] == 'No' || $premiosDisponibles[$j]['canjeable'] == 'no' ){
                        echo '<span class="red-text text-darken-2"> <center> <h4> Premio ya canjeado </h4> </center> ';
                    }else{
                        echo '<span class="green-text text-darken-2"> <center>
                        <h4> Disponible para canje </h4> </center> ';
                    }

                    //echo 'Canjeable: ' . $premiosDisponibles[$j]['canjeable'];

                }

            }
            

        }else{

            echo '   
            
            <span class="black-text text-darken-2"> <center> <h5> Te faltan </h5> </center> 

            <span class="pink-text"> <center> <h4> '. ($datosPremios[$i]['visitasRequeridas'] - $totalVisitas ).' </h4> </center> </span>

            <span class="black-text text-darken-2"> <center> <h5> Visitas </h5> </center> </span>';

        }
        
        echo '    </div>

                        </div>
                    </div>
                </div>';
                



    }

?>