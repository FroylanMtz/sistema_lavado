
<?php 
    
    // Traer todos los datos de la tabla premios
    // Se crea un objeto del tipo Controlador
    $controlador = new Controlador1();

    // Se pasa el nombre de la tabla como parámetro
    $premios = $controlador->getAll("premios");

       // Si se oprimió el botón de agregar premio
    if(isset($_POST["agregar"])){
        echo "agregar";
    }
?>

<div class="row">
        <div class="page-header">
          <div class="d-flex align-items-center">
              <h2 class="page-header-title">Ver Premios</h2>        
          </div>
        </div>
</div><br>


     <div class="col-xl-6">
            <!-- Block Buttons -->            
            <div class="row">                           
                <div class="col-xl-6">
                    <button onclick="registroPremios();" name="agregar" type="button" class="btn btn-shadow btn-block mb-2">Agregar Premio</button>
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
                        <th>Visitas Requeridas</th>
                      </tr>
                    </thead>
                  <tbody>
                  <?php 
                  // Se muestran todos los registros de los admin con un foreach
                  foreach($premios as $premios)://inicio foreach
                  ?>        
                  <tr>
                    <td><?php echo $premios["premio_id"]; ?></td>
                    <td><?php echo $premios["nombrePremio"]; ?></td>
                    <td><?php echo $premios["descripcion"]; ?></td>
                    <td><?php echo $premios["visitasRequeridas"]; ?></td>
                    <td class="td-actions">
                      <a href="index.php?action=verPremios&id=<?php echo($premios["premio_id"]); ?>"><i class="la la-search edit"></i></a>
                      <a href="index.php?action=editarPremios&id=<?php echo($premios["ppremio_id"]); ?>"><i class="la la-edit edit"></i></a>
                      <a href="index.php?action=borrarPremio&id=<?php echo($premios["premio_id"]); ?>"><i class="la la-trash delete"></i></a>
                   </td>
                  </tr>    
              <?php  endforeach; // FIN foreach?>
            </tbody>
          </table>
 <!-- Script para redireccionar a la página de agregar usuario -->
    <script type="text/javascript">
        function registroPremios(){
            window.location.href = "index.php?action=registroPremios";
        }
    </script>
                