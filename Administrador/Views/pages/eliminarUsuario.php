<?php 
    
    // Se crea un objeto del tipo Controlador1
    $controlador = new Controlador1();
    
    if(isset($_GET["id"])){
        // Llamar al método para obtener los datos del admin
        $admin = $controlador->getAdminById($_GET["id"]);
    }
    
    // Si se oprimió el botón de guardar datos
    if(isset($_POST["eliminar"])){        
        // Se compara que la contraseña ingresada y la del usaurio en sesión sean iguales
        if($_SESSION["password"] == $_POST["password"]){
            // Se llama al método para agregar usuario
            $controlador->eliminarUsuario();            
        }else{
            // Si no coinciden las contraseñas se muestra el mensaje
            echo "<script> alert('Contraseña incorrecta!'); </script>";
        }
        
    }


 ?>

<!-- Form -->
    <div class="widget has-shadow">
        <div class="widget-header bordered no-actions d-flex align-items-center">
            <h4>
                <?php                     
                    echo "Eliminar Usuario: <strong>".$admin["nombreUsuario"]."</strong>";
                 ?>
            </h4>
        </div>
        <div class="widget-body"><br>
            <!-- FORM PARA ELIMINAR UN ADMIN (SOLO SE INGRESA LA CONTRASEÑA DE SESSION) -->
            <form class="needs-validation" method="POST" enctype="multipart/form-data">

                <!-- ID DEL ADMIN -->
                <input type="hidden" name="id" value="<?php echo($admin["admin_id"]) ?>">
      
                <center><h3>Para eliminar al usuario ingrese su contraseña</h3></center><br>
                <!-- EMAIL -->
                <div class="form-group row d-flex align-items-center mb-5">                    
                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Contraseña</label>
                    <div class="col-lg-5">
                        <div class="input-group">
                            <input type="password" class="form-control" placeholder="Contraseña" required name="password">
                            <span class="input-group-addon addon-orange"><i class="la la-trash"></i></span>
                        </div>
                    </div>
                </div>
                

                
                <div class="text-center">
                    <button class="btn btn-danger" type="submit" name="eliminar">Eliminar</button>                    
                </div>
            </form>
        </div>
        <br><br><br><br><br>
    </div>

    <!-- End Form -->