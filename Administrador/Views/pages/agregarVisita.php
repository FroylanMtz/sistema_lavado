<?php 
    
    // Se crea un objeto del tipo Controlador1
    $controlador = new Controlador1();
    
    
    
    // Si se oprimió el botón de guardar datos
    if(isset($_POST["agregar"])){        
        // Se compara que la contraseña ingresada y la del usaurio en sesión sean iguales
        if($_SESSION["password"] == $_POST["password"]){
            // Se llama al método para agregar visita
            $controlador->agregarVisita();             
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
                    echo "Agregar visita - Cupón: <strong>".$_GET["id"]."</strong>";
                 ?>
            </h4>
        </div>
        <div class="widget-body"><br>
            <!-- FORM PARA AGREGAR VISITA (SOLO SE INGRESA LA CONTRASEÑA DE SESSION) -->
            <form class="needs-validation" method="POST" enctype="multipart/form-data">

                <!-- ID DEL ADMIN -->
                <input type="hidden" name="id" value="<?php echo($admin["admin_id"]) ?>">
      
                <center><h3>Para agregar la <strong>visita</strong> ingrese su contraseña</h3></center><br>
                <!-- EMAIL -->
                <div class="form-group row d-flex align-items-center mb-5">                    
                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Contraseña</label>
                    <div class="col-lg-5">
                        <div class="input-group">
                            <input type="password" class="form-control" placeholder="Contraseña" required name="password">
                        </div>
                    </div>
                </div>
                

                
                <div class="text-center">
                    <button class="btn btn-success" type="submit" name="agregar">Agregar visita</button>                    
                </div>
            </form>
        </div>
        <br><br><br><br><br>
    </div>

    <!-- End Form -->