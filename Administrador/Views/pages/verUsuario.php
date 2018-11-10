<?php 
    
    // Se declara un objeto del tipo Controlador1
    $controlador = new Controlador1();

    // Se trae el id con GET del usuario
    if(isset($_GET["id"])){
        // Se llama al método para obtener los datos del admin
        $admin = $controlador->getAdminById($_GET["id"]);
        // Si no se obtuvieron resultados quiere decir que el id no se encuentra en la base
        // de datos por lo tanto se manda el siguiente mensaje
        if($admin == false){
            echo '<script> 
                        alert("error -> Id No registrado!");
                        window.location.href = "index.php?action=listaDeUsuarios";
                  </script>';
        }

        $nombreCompleto = $admin["nombreAdmin"] . " " . $admin["apellidos"];
    }


 ?>





<!-- Begin Widget 13 -->
<center>
    <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12">
        <div class="widget widget-13 has-shadow">
            <div class="widget-body p-0">
                <div class="author-avatar">
                    <img src="fotosAdmin/<?php echo($admin["foto"]) ?>" alt="..." class="img-fluid rounded-circle">
                </div>

                <!-- NOMBRE DE USUARIO -->
                <div class="author-name">
                    <?php echo $admin["nombreUsuario"]; ?>
                    <span>Administrador</span>
                </div>
                
                <!-- BOTONES PARA EDITAR Y ELIMINAR -->
                <div class="follow-btn text-center mt-4">
                    <a class="btn btn-primary" href="index.php?action=editarUsuario&id=<?php echo $_GET["id"] ?>">Editar</a>
                    <a class="btn btn-danger" href="index.php?action=eliminarUsuario&id=<?php echo $_GET["id"] ?>">Eliminar</a>
                </div>
                

                <!-- NOMBRE COMPLETO -->
                <div class="social-stats mt-5">
                    <div class="row d-flex justify-content-between">
                        <div class="col-4 text-center">
                            <i class="la la-user"></i>
                            <div class="counter"><?php echo $nombreCompleto ?></div>
                            <div class="heading">Nombre completo</div>
                        </div>

                        <!-- CORREO -->
                        <div class="col-4 text-center">
                            <i class="la la-at"></i>
                            <div class="counter"><?php echo $admin["correo"] ?></div>
                            <div class="heading">Correo</div>
                        </div>

                        <!-- TELÉFONO -->
                        <div class="col-4 text-center">
                            <i class="la la-phone"></i>
                            <div class="counter"><?php echo $admin["telefono"]; ?></div>
                            <div class="heading">Teléfono</div>
                        </div>
                    </div>
                </div>
                <div class="shape-container">
                    <svg class="wavy" viewbox="00 0 85 25">
                        <path fill="#e4e8f0" d="M0 30 V15 Q30 3 60 15 V30z" />
                        <path fill="#5d5386" d="M0 30 V5 Q30 20 55 12 T100 11 V30z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
    </center>
    <!-- End Widget 13 -->