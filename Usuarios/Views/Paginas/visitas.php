<?php

//Se instancia una objeto de la clase controlador
$controlador = new Controlador();

//Se define un arreglo en donde se guardaran los datos traidos por el contorlador acerca de las visitas desde la tabla que lleva ese nombre
$datosVisitas = array();

//Se hace la carga del arreglo con dichos datos
$datosVisitas = $controlador -> obtenerVisitas();

//esta variable almacena su total, para mostrarlo en la parte superior con un color rosado
$totalVisitas = count($datosVisitas);



?>

<!--Pagina que muestra las visitas realizadas por el dueño del cupon de la sesion actual, las visitas son desplegadas en una pagina, asi como el total en la parte superior con ltras contrastantes para que se note facilmente-->
<div class="col s12 mt-5 " id="pan" >
    <a href="index.php?pagina=inicio" class="breadcrumb"> Inicio </a>
    <a href="index.php?pagina=visitas" class="breadcrumb"> Visitas </a>
</div>

<!--Titulo de la pagina-->
<div class="row">
    <h4> Visitas realizadas </h4>
</div>


<div class="row">

    <!--Texto que muestra el total de las visitas-->
    <label style='float: right;'>
        <span class='pink-text' href='#!'> <h5> <b>Tus visitas: <?= $totalVisitas ?> </b> </h5> </span>
    </label>

    <div class="col s12" >
        <div class="card gray-light darken-4">
            <!--Es desplegada una tabla con los datos de las visitas dinamicamente-->
            <table>
                <thead>
                <tr>
                    <th><center> Id de visita </center> </th>
                    <th> <center> Producto/Servicio </center> </th>
                    <th> <center> Total </center> </th>
                    <th> <center> Fecha </center> </th>
                </tr>
                </thead>

                <tbody>
                    <?php
                        for($i=0; $i< count($datosVisitas); $i++ ){
                            
                            echo '<tr>';
                            echo '<td> <center>' . $datosVisitas[$i]['visita_id'] . ' </center> </td>';
                            echo '<td> <center> '. $datosVisitas[$i]['productoServicio'] .' </center> </td>';
                            echo '<td> <center> $ '. $datosVisitas[$i]['total'] .' Pesos </center> </td>';
                            echo '<td> <center> '. $datosVisitas[$i]['fecha'] .' </center> </td>';


                        }
                    ?>
                    
                </tbody>
            </table>

        </div>
    </div>


<div>

