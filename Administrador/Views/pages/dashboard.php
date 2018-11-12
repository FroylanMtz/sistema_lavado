<?php 

    // Traer todos los numeros de registros de algunas tablas
    // nuevo controlador
    $controlador = new Controlador1();

    // # de usuarios
    $usuarios = $controlador->numeroUsuarios();

    // # de cupones
    $cupones = $controlador->numeroCupones();

    // # de visitas
    $visitas = $controlador->numeroDeVisitas();

    // # de promociones
    $promociones = $controlador->numeroPromociones();

    // # de premios
    $premios = $controlador->numeroPremios();

    // # de horarios
    $horarios = $controlador->numeroHorarios();

 ?>



    <div class="row">
        <div class="page-header">
          <div class="d-flex align-items-center">
              <h2 class="page-header-title">Dashboard <?php echo $_SESSION["usuario"]; ?></h2>     <?php 
                        if(isset($_SESSION["foto"])){
                            echo "session";
                        }else{
                            echo "no sesion";
                        }
               ?>
          </div>
        </div>
    </div><br>


       <!-- Begin Row  PRIMERA FILA -->       
            <div class="row flex-row">
                <!-- Begin Facebook TOTAL DE USUARIOS -->
                <div class="col-xl-4 col-md-6 col-sm-6">
                    <div class="widget widget-12 has-shadow">
                        <div class="widget-body">
                            <div class="media">
                                <div class="align-self-center ml-5 mr-5">
                                    <i class="la la-user text-twitter"></i>
                                </div>
                                <div class="media-body align-self-center">
                                    <div class="title text-twitter">Usuarios</div>
                                    <!-- # de usuarios -->
                                    <div class="number">Total: <?php echo $usuarios; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
                <!-- End Facebook -->
                <!-- Begin Twitter TOTAL DE CUPONES -->
                <div class="col-xl-4 col-md-6 col-sm-6">
                    <div class="widget widget-12 has-shadow">
                        <div class="widget-body">
                            <div class="media">
                                <div class="align-self-center ml-5 mr-5">
                                    <i class="la la-ticket text-linkedin"></i>
                                </div>
                                <div class="media-body align-self-center">
                                    <div class="title text-linkedin">Cupones</div>
                                    <!-- # de cupones -->
                                    <div class="number">Total: <?php echo $cupones; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Twitter -->
                <!-- Begin Twitter TOTAL DE VISITAS -->
                <div class="col-xl-4 col-md-6 col-sm-6">
                    <div class="widget widget-12 has-shadow">
                        <div class="widget-body">
                            <div class="media">
                                <div class="align-self-center ml-5 mr-5">
                                    <i class="la la-car text-twitter"></i>
                                </div>
                                <div class="media-body align-self-center">
                                    <div class="title text-twitter">Visitas</div>
                                    <!-- # de visitas -->
                                    <div class="number">Total: <?php echo $visitas; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Twitter -->
             
            </div>            
            <!-- End Row -->

            <!-- SEGUNDA FILA -->
            <!-- Begin Row -->
            <div class="row flex-row">
               <!-- Begin Linkedin  TOTAL DE PROMOCIONES -->
                <div class="col-xl-4 col-md-6 col-sm-6">
                    <div class="widget widget-12 has-shadow">
                        <div class="widget-body">
                            <div class="media">
                                <div class="align-self-center ml-5 mr-5">
                                    <i class="la la-flag-checkered text-linkedin"></i>
                                </div>
                                <div class="media-body align-self-center">
                                    <div class="title text-linkedin">Promociones</div>
                                    <!-- # de pomociones -->
                                    <div class="number">Total: <?php echo $promociones; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Linkedin -->
                
                <!-- Begin Twitter TOTAL DE PREMIOS -->
                <div class="col-xl-4 col-md-6 col-sm-6">
                    <div class="widget widget-12 has-shadow">
                        <div class="widget-body">
                            <div class="media">
                                <div class="align-self-center ml-5 mr-5">
                                    <i class="la la-gift text-twitter"></i>
                                </div>
                                <div class="media-body align-self-center">
                                    <div class="title text-twitter">Premios</div>
                                    <!-- # de premios -->
                                    <div class="number">Total: <?php echo $premios; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Twitter -->
               
                <!-- Begin Facebook TOTAL DE HORARIOS -->
                <div class="col-xl-4 col-md-6 col-sm-6">
                    <div class="widget widget-12 has-shadow">
                        <div class="widget-body">
                            <div class="media">
                                <div class="align-self-center ml-5 mr-5">
                                    <i class="la la-clock-o text-linkedin"></i>
                                </div>
                                <div class="media-body align-self-center">
                                    <div class="title text-linkedin">Horarios</div>
                                    <!-- # de horarios -->
                                    <div class="number">Total: <?php echo $horarios; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
                <!-- End Facebook -->
            </div>
            <!-- End Row -->