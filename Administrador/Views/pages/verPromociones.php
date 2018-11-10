
<?php 
    
    // Traer todos los datos de la tabla administradores
    // Se crea un objeto del tipo Controlador1
    $controlador = new Controlador1();

    // Llamada al método que trae los datos de los usuarios (admin)
    // Se pasa el nombre de la tabla como parámetro
    $promociones = $controlador->getAll("promociones");

       // Si se oprimió el botón de agregar usuario
    if(isset($_POST["agregar"])){
        echo "agregar";
    }
?>

<div class="row">
        <div class="page-header">
          <div class="d-flex align-items-center">
              <h2 class="page-header-title">Ver Promociones</h2>        
          </div>
        </div>
</div><br>


     <div class="col-xl-6">
            <!-- Block Buttons -->            
            <div class="row">                           
                <div class="col-xl-6">
                    <button onclick="registroPromociones();" name="agregar" type="button" class="btn btn-shadow btn-block mb-2">Agregar Promocion</button>
                </div>
            </div>
            <!-- End Block Buttons -->
        </div>
    <br>

                 <table id="sorting-table" class="table mb-0">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                      </tr>
                    </thead>
                  <tbody>
                  <?php 
                  // Se muestran todos los registros de los admin con un foreach
                  foreach($promociones as $promociones)://inicio foreach
                  ?>        
                  <tr>
                    <td><?php echo $promociones["promocion_id"]; ?></td>
                    <td><?php echo $promociones["nombrePromocion"]; ?></td>
                    <td><?php echo $promociones["descripcion"]; ?></td>
                    <td class="td-actions">
                      <a href="index.php?action=verPromociones&id=<?php echo($promociones["promocion_id"]); ?>"><i class="la la-search edit"></i></a>
                      <a href="index.php?action=editarPromocion&id=<?php echo($promociones["promocion_id"]); ?>"><i class="la la-edit edit"></i></a>
                      <a href="index.php?action=borrarPromocion&id=<?php echo($promociones["promocion_id"]); ?>"><i class="la la-trash delete"></i></a>
                   </td>
                  </tr>    
              <?php  endforeach; // FIN foreach?>
            </tbody>
          </table>
 <!-- Script para redireccionar a la página de agregar usuario -->
    <script type="text/javascript">
        function registroPromociones(){
            window.location.href = "index.php?action=registroPromociones";
        }
    </script>
                