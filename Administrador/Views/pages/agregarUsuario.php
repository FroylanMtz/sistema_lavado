<?php 
    
    // Si se oprimió el botón de guardar datos
    if(isset($_POST["usuario"])){
        // Se crea un objeto del tipo Controlador1
        $controlador = new Controlador1();
        // Se llama al método para agregar usuario
        $controlador->agregarUsuario();        
    }


 ?>

<!-- Form -->
    <div class="widget has-shadow">
        <div class="widget-header bordered no-actions d-flex align-items-center">
            <h4>Agregar Usuario</h4>
        </div>
        <div class="widget-body">
            <form class="needs-validation" method="POST" enctype="multipart/form-data">
                <!-- NOMBRE DE USUARIO -->
                <div class="form-group row d-flex align-items-center mb-5">
                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Nombre de usuario</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" placeholder="Nombre de usuario" required name="usuario">
                    </div>
                </div>

                <!-- NOMBRE -->
                <div class="form-group row d-flex align-items-center mb-5">
                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Nombre </label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" placeholder="Nombre" required name="nombre">
                    </div>
                </div>

                <!-- APELLIDOS -->
                <div class="form-group row d-flex align-items-center mb-5">
                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Apellidos </label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" placeholder="Apellidos" required name="apellidos">
                    </div>
                </div>

                <!-- EMAIL -->
                <div class="form-group row d-flex align-items-center mb-5">
                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Correo electrónico</label>
                    <div class="col-lg-5">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Correo electrónico" required name="correo">
                            <span class="input-group-addon addon-orange"><i class="la la-at"></i></span>
                        </div>
                    </div>
                </div>
                <!-- CONTRASEÑA -->
                <div class="form-group row d-flex align-items-center mb-5">
                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Contraseña</label>
                    <div class="col-lg-5">
                        <input type="password" class="form-control" placeholder="Ingrese la contraseña" required name="password">                       
                    </div>
                </div>

                <!-- TELÉFONO -->
                <div class="form-group row d-flex align-items-center mb-5">
                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Teléfono</label>
                    <div class="col-lg-5">
                        <div class="input-group">
                            <span class="input-group-addon addon-primary">
                                <i class="la la-phone"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="Número de teléfono" name="telefono">
                        </div>
                    </div>
                </div>


                <!-- FOTO -->
                <div class="form-group row d-flex align-items-center mb-5">
                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Foto</label>
                    <div class="col-lg-5">
                        <div class="input-group">
                            <span class="input-group-addon addon-secondary">
                                <i class="la la-file-photo-o"></i>
                            </span>
                            <input type="file" class="form-control" name="foto">
                        </div>
                    </div>
                </div>
               

                
                <div class="text-center">
                    <button class="btn btn-gradient-02" type="submit" name="guardar">Guardar datos</button>
                    <button class="btn btn-shadow" type="reset">Borrar</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Form -->