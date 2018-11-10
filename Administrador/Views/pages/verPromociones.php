<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Vista de Promociones </h1>
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
                  foreach($Promociones as $Promociones): // Inicio foreach
                  ?>        
                  <tr>
                    <td><span style="width:100px;"><span class="badge-text badge-text-small info"><?php echo $Promociones["nombrePromocion"]; ?></span></span></td>
                    <td><span class="text-primary"><?php echo $Promociones["nombreAdmin"]; ?></span></td>
                    <td><?php echo $Promociones["apellidos"]; ?></td>
                    <td><?php echo $Promociones["telefono"]; ?></td>
                    <td><?php echo $Promociones["correo"]; ?></td>
                    <td><?php echo $Promociones["foto"]; ?></td>
                    <td class="td-actions">
                      <a href="index.php?action=verPromociones&id=<?php echo($Promociones["admin_id"]); ?>"><i class="la la-search edit"></i></a>
                      <a href="index.php?action=editarPromocion&id=<?php echo($promociones["admin_id"]); ?>"><i class="la la-edit edit"></i></a>
                      <a href="index.php?action=eliminarUsuario&id=<?php echo($promociones["admin_id"]); ?>"><i class="la la-trash delete"></i></a>
                   </td>
                  </tr>    
              <?php  endforeach; // FIN foreach?>
            </tbody>
          </table>
                