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
                                    <div class="number">10,865 Likes</div>
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
                                    <div class="number">8,986 Followers</div>
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
                                    <div class="number">8,986 Followers</div>
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
                                    <div class="number">3,654 Followers</div>
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
                                    <div class="number">8,986 Followers</div>
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
                                    <div class="number">10,865 Likes</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
                <!-- End Facebook -->
            </div>
            <!-- End Row -->