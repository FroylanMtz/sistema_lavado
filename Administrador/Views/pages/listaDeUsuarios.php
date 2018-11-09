<?php 
    
    // Traer todos los datos de la tabla administradores
    // Se crea un objeto del tipo Controlador1
    $controlador = new Controlador1();

    // Llamada al método que trae los datos de los usuarios (admin)
    // Se pasa el nombre de la tabla como parámetro
    $usuarios = $controlador->getAll("administradores");    


    // Si se oprimió el botón de agregar usuario
    if(isset($_POST["agregar"])){
        echo "agregar";
    }

 ?>

<div class="row">
        <div class="page-header">
          <div class="d-flex align-items-center">
              <h2 class="page-header-title">Lista de usuarios</h2>              
          </div>
        </div>
    </div>

     <div class="col-xl-6">
            <!-- Block Buttons -->            
            <div class="row">                           
                <div class="col-xl-6">
                    <button onclick="agregarUsuario();" name="agregar" type="button" class="btn btn-shadow btn-block mb-2">+ Agregar Usuario</button>
                </div>
            </div>
            <!-- End Block Buttons -->
        </div>
    <br>
    <table id="sorting-table" class="table mb-0">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Nombre(s)</th>
                <th>Apellido(s)</th>
                <th>Teléfono</th>
                <th><span style="width:100px;">Correo</span></th>
                <th>Foto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            // Se muestran todos los registros de los admin con un foreach
            foreach($usuarios as $usuario): // Inicio foreach
        ?>        
            <tr>
                <td><span style="width:100px;"><span class="badge-text badge-text-small info"><?php echo $usuario["nombreUsuario"]; ?></span></span></td>
                <td><span class="text-primary"><?php echo $usuario["nombreAdmin"]; ?></span></td>
                <td><?php echo $usuario["apellidos"]; ?></td>
                <td><?php echo $usuario["telefono"]; ?></td>
                <td><?php echo $usuario["correo"]; ?></td>
                <td><?php echo $usuario["foto"]; ?></td>
                <td class="td-actions">
                    <a href="index.php?action=verUsuario&id=<?php echo($usuario["admin_id"]); ?>"><i class="la la-search edit"></i></a>
                    <a href="index.php?action=editarUsuario&id=<?php echo($usuario["admin_id"]); ?>"><i class="la la-edit edit"></i></a>
                    <a href="index.php?action=eliminarUsuario&id=<?php echo($usuario["admin_id"]); ?>"><i class="la la-trash delete"></i></a>
                </td>
            </tr>
              
        <?php  endforeach; // FIN foreach?>

        </tbody>
    </table>

    <!-- Script para redireccionar a la página de agregar usuario -->
    <script type="text/javascript">
        function agregarUsuario(){
            window.location.href = "index.php?action=agregarUsuario";
        }
    </script>


            