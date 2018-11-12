<?php 
    
    // Traer todos los datos de un cupón con sus respectivos premios, se crea un objeto del tipo controlador 1
    $controlador = new Controlador1();
    
    // Se llama al método para obtener los premios de un cupón
    $premiosCupones = $controlador->obtenerPremiosCupones();

    // Si se oprimió el botón de canjear
    if(isset($_POST["canjear"])){
        // Llamada al método para canjear cupón
        $controlador->canjearCupon();
        //echo $_GET["premio"] ."<br>"; ID PREMIO
        //echo $_GET["id"]; ID CUPON
    }
 ?>

<div class="row">
        <div class="page-header">
          <div class="d-flex align-items-center">
              <h2 class="page-header-title">ID del cupón: <strong><?php echo $_GET["id"]; ?></strong></h2>              
          </div>
        </div>

    </div><br>


    <br>

    <table id="sorting-table" class="table mb-0">
        <thead>
            <tr>
                <th>Premios</th>
                <th>Descripción</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            // Si tiene premios canjeados o canjeables se muestran, sino el mensaje ad hoc
            if($premiosCupones){
                // Se muestran los diferentes premios del cupón con foreach
              foreach($premiosCupones as $premioCupon):
                echo "<tr>";
                echo "<td>" . $premioCupon["premio_id"] . "</td>";
                echo "<td>" . $premioCupon["descripcion"] . "</td>";

                if($premioCupon["canjeable"]=="SI"){
                    $id = $_GET["id"];
                    ?>

                    <form method="POST" action="index.php?action=cupon&premio=<?php echo($premioCupon["premio_id"]) ?>&id=<?php echo($id) ?>">
                    
                    <td><button class="btn btn-success" type="submit" name="canjear">Canjeable</button></td>
                    </form>
                <?php                  
                }else{
                    echo "<td> Canjeado </td>";
                }
              endforeach;
            }else{
                echo "Este cupón aún no tiene premios canjeados o por canjear";
            }
         ?>            
        </tbody>
    </table>

  

            