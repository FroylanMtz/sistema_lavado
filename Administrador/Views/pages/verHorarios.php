<?php 
  // Traer todos los datos de la tabla promociones
  // Se crea un objeto del tipo Controlador2
  $controlador = new Controlador2();

  // Se pasa el nombre de la tabla como parámetro
  $horarios = $controlador->getAll("horarios");

  // Si se oprimió el botón de agregar promocion
  if(isset($_POST["agregar"])){
    echo "agregar";
  }
?>

<div class="row">
  <div class="page-header">
    <div class="d-flex align-items-center">
      <h2 class="page-header-title">Ver Horarios</h2>        
    </div>
  </div>
</div><br>


<div class="col-xl-6">
  <!-- Block Buttons -->            
    <div class="row">                           
      <div class="col-xl-6">
        <button onclick="registroHorarios();" name="agregar" type="button" class="btn btn-shadow btn-block mb-2">Registrar Horario</button>
      </div>
    </div>
  <!-- End Block Buttons -->
</div>
    
<br>
  <table id="sorting-table" class="table mb-0">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Horario</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                  <tbody>
                  <?php 
                  // Se muestran todos los registros de horarios con un foreach
                  foreach($horarios as $horarios)://inicio foreach
                  ?>        
                  <tr>
                    <td><?php echo $horarios["horario_id"]; ?></td>
                    <td><?php echo $horarios["horario"]; ?></td>
                    <td class="td-actions">                      
                      <a href="index.php?action=editarHorario&id=<?php echo($horarios["horario_id"]); ?>"><i class="la la-edit edit"></i></a>
                      <a href="index.php?action=borrarHorario&id=<?php echo($horarios["horario_id"]); ?>"><i class="la la-trash delete"></i></a>
                   </td>
                  </tr>    
              <?php  endforeach; // FIN foreach?>
            </tbody>
          </table>
 <!-- Script para redireccionar a la página de agregar promocion -->
    <script type="text/javascript">
        function registroHorarios(){
            window.location.href = "index.php?action=registroHorarios";
        }
    </script>

    