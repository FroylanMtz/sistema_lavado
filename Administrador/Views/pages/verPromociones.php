
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
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Promociones</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Promociones</h3>

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
                    <td><span style="width:100px;"><span class="badge-text badge-text-small info"><?php echo $promociones["nombrePromocion"]; ?></span></span></td>
                    <td><span class="text-primary"><?php echo $promociones["nombrePromocion"];?></span></td>
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
                