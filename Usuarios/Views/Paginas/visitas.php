<?php

$controlador = new Controlador();

$datosVisitas = array();

$datosVisitas = $controlador -> obtenerVisitas();

$totalVisitas = count($datosVisitas);



?>


<div class="col s12 mt-5 " id="pan" >
    <a href="index.php?pagina=inicio" class="breadcrumb"> Inicio </a>
    <a href="index.php?pagina=visitas" class="breadcrumb"> Visitas </a>
</div>

<div class="row">
    <h4> Visitas realizadas </h4>
</div>


<div class="row">

    <label style='float: right;'>
        <span class='pink-text' href='#!'> <h5> <b>Tus visitas: <?= $totalVisitas ?> </b> </h5> </span>
    </label>

    <div class="col s12" >
        <div class="card gray-light darken-4">

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

