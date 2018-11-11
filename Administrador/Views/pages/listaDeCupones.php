<?php 
    
    // Traer todos los datos de la tabla administradores
    // Se crea un objeto del tipo Controlador1
    $controlador = new Controlador1();

    // Llamada al método que trae los datos de los usuarios (admin)
    // Se pasa el nombre de la tabla como parámetro
    $cupones = $controlador->getAll("cupones");    


    // Si se oprimió el botón de agregar usuario
    if(isset($_POST["generar"])){                
        // Se llama a la función del controlador para generar un cupón
        $controlador->generarCupon();                    
    }

 ?>

<div class="row">
        <div class="page-header">
          <div class="d-flex align-items-center">
              <h2 class="page-header-title">Lista de cupones</h2>              
          </div>
        </div>

    </div><br>



     <div class="col-xl-6">
            <!-- Block Buttons -->            
            <div class="row">                           
                <div class="col-xl-6">
                    <form method="POST">
                    <button name="generar" type="submit" class="btn btn-shadow btn-block mb-2">+ Generar cupón</button>
                    </form>
                </div>
            </div>
            <!-- End Block Buttons -->
        </div>
    <br>

    <table id="sorting-table" class="table mb-0">
        <thead>
            <tr>
                <th>ID del cupón</th>
                <th>Fecha de expiración</th>                
                <th>Detalles</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            // Se muestran todos los registros de los admin con un foreach
            // se muestra un mensaje si no hay cupones
            if($cupones){
                foreach($cupones as $cupon): // Inicio foreach
        ?>        
                <tr>
                    <td><span style="width:100px;"><span class="badge-text badge-text-small info"><?php echo $cupon["cupon_id"]; ?></span></span></td>
                    <td><span class="text-primary"><?php echo $cupon["expiracion"]; ?></span></td>
                    
                    <td class="td-actions">
                        <a href="index.php?action=verUsuario&id=<?php echo($cupon["admin_id"]); ?>"><i class="la la-search edit"></i></a>                    
                    </td>
                </tr>
              
        <?php  endforeach; // FIN foreach?>
      <?php }  // FIN IF
            else{
                echo "<tr><td>No hay cupones</td></tr>";
            }
                ?>
            
        </tbody>
    </table>

  

            