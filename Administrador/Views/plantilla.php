<?php 

    // Si se cerró la sesión (botón cerrar sesión oprimido)
    if(isset($_POST["cerrarSesion"])){
        session_destroy();
        echo '<script> window.location.href = "index.php"; </script>';
    }


 ?>

<!DOCTYPE html>
<!--
Item Name: Elisyam - Web App & Admin Dashboard Template
Version: 1.5
Author: SAEROX

** A license must be purchased in order to legally use this template for your project **
-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Elisyam - Dashboard</title>
        <meta name="description" content="Elisyam is a Web App and Admin Dashboard Template built with Bootstrap 4">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Google Fonts -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
        <script>
          WebFont.load({
            google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="Public/assets/img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="Public/assets/img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="Public/assets/img/favicon-16x16.png">
        <!-- Stylesheet -->
        <link rel="stylesheet" href="Public/assets/vendors/css/base/bootstrap.min.css">
        <link rel="stylesheet" href="Public/assets/vendors/css/base/elisyam-1.5.min.css">
        <link rel="stylesheet" href="Public/assets/css/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="Public/assets/css/owl-carousel/owl.theme.min.css">
        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    </head>
    <body id="page-top">
        <!-- Begin Preloader -->
        <div id="preloader">
            <div class="canvas"> <!-- IMAGEN QUE APARECE AL CARGAR LA PÁGINA -->
                <img src="Public/imagenes/dwash.png" alt="logo" class="loader-logo">
                <div class="spinner"></div>   
            </div>
        </div>
        <!-- End Preloader -->
        <div class="page">
            <!-- Begin Header -->
            <header class="header">
                <nav class="navbar fixed-top">         
                    <!-- Begin Search Box-->
                    <div class="search-box">
                        <button class="dismiss"><i class="ion-close-round"></i></button>
                        <form id="searchForm" action="#" role="search">
                            <input type="search" placeholder="Search something ..." class="form-control">
                        </form>
                    </div>
                    <!-- End Search Box-->
                    <!-- Begin Topbar -->
                    <div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
                        <!-- Begin Logo -->
                        <div class="navbar-header"> <!-- IMAGEN EN LA PARTE SUPERIOR IZQ -->
                            <a href="db-default.html" class="navbar-brand">
                                <div class="brand-image brand-big">
                                    <img src="Public/imagenes/dwash.png" alt="logo" class="logo-big" width="20px" height="80px">
                                </div> <!-- IMAGEN CUANDO SE ACHICA -->
                                <div class="brand-image brand-small">
                                    <img src="Public/imagenes/dwash.png" alt="logo" class="logo-small">
                                </div>
                            </a>
                            <!-- Toggle Button -->
                            <a id="toggle-btn" href="#" class="menu-btn active">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                            <!-- End Toggle -->
                        </div>
                        <!-- End Logo -->
                        <!-- Begin Navbar Menu -->
                        <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center pull-right">
                            <!-- Search -->
                            
                            <!-- End Notifications -->
                            <!-- User IMAGEN DEL USUARIO -->                  
                            <li class="nav-item dropdown"><a id="user" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><img src="Public/assets/img/avatar/avatar-01.jpg" alt="..." class="avatar rounded-circle"></a>
                                <ul aria-labelledby="user" class="user-size dropdown-menu">
                                    <li class="welcome">
                                        <a href="#" class="edit-profil"><i class="la la-gear" data-toggle="popover" data-placement="top" data-content="Pellentesque"></i></a> 
                                        <!-- IMAGEN DEL USUARIO AL DESPLEGAR EL MENÚ -->
                                        <img src="Public/assets/img/avatar/avatar-01.jpg" alt="..." class="rounded-circle">                                        
                                    </li>
                                    <li>
                                        <form method="POST">
                                        <center><a href="#" class="dropdown-item"> 
                                            <button name="cerrarSesion" class="btn btn-danger">Cerrar Sesión</button>                                            
                                        </a></center>                                    
                                        </form>
                                    </li>                                 
                                    <li class="separator"></li>
                                    
                                </ul>
                            </li>
                            <!-- End User -->
                            <!-- Begin Quick Actions -->
                            
                            <!-- End Quick Actions -->
                        </ul>
                        <!-- End Navbar Menu -->
                    </div>
                    <!-- End Topbar -->
                </nav>
            </header>
            <!-- End Header -->
            <!-- Begin Page Content -->

            <div class="page-content d-flex align-items-stretch">
                <!-- SE INCLUYE LA NAVGACIÓN -->
            <?php include 'Views/pages/navegacion1.php'; ?>
            <?php include 'Views/pages/navegacion2.php'; ?>
                <!-- End Left Sidebar -->
                <div class="content-inner">

                    <div class="container-fluid">
                       
                        <?php 
                            // Se crea un objeto del tipo Controlador1, es el que
                            // manejará las páginas a incluir
                            $paginas = new Controlador1();
                            // Se manda llamar el método mostrar página
                            $paginas->mostrarPagina();

                         ?>

                        <br><br><br><br><br><br><br><br><br>
                        <br><br><br><br><br><br><br><br><br>
                        <br><br>
                        <!-- End Row -->
                        
                    </div>

                    <!-- End Container -->
                    <!-- Begin Page Footer-->
                    <footer class="main-footer">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-start justify-content-lg-start justify-content-md-start justify-content-center">
                                <p class="text-gradient-02">Diseñado por Alejandra Domínguez, David Tovias y Froylán Wbario</p>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-end justify-content-lg-end justify-content-md-end justify-content-center">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Práctica 14</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">DWASH - Autolavado (Widescreen)</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </footer>
                    <!-- End Page Footer -->
                    <a href="#" class="go-top"><i class="la la-arrow-up"></i></a>
                    <!-- Offcanvas Sidebar -->
                    <div class="off-sidebar from-right">
                        <div class="off-sidebar-container">
                            <header class="off-sidebar-header">
                                <ul class="button-nav nav nav-tabs mt-3 mb-3 ml-3" role="tablist" id="weather-tab">
                                    <li><a class="active" data-toggle="tab" href="#messenger" role="tab" id="messenger-tab">Messages</a></li>
                                    <li><a data-toggle="tab" href="#today" role="tab" id="today-tab">Today</a></li>
                                </ul>
                                <a href="#off-canvas" class="off-sidebar-close"></a>
                            </header>
                        
                            <!-- End Offcanvas Container -->
                        </div>
                        <!-- End Offsidebar Container -->
                    </div>
                    <!-- End Offcanvas Sidebar -->
                </div>
                <!-- End Content -->
            </div>
            <!-- End Page Content -->
        </div>
        <!-- Begin Success Modal -->
        <div id="delay-modal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <div class="sa-icon sa-success animate" style="display: block;">
                            <span class="sa-line sa-tip animateSuccessTip"></span>
                            <span class="sa-line sa-long animateSuccessLong"></span>
                            <div class="sa-placeholder"></div>
                            <div class="sa-fix"></div>
                        </div>
                        <div class="section-title mt-5 mb-5">
                            <h2 class="text-dark">Meeting successfully created</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Success Modal -->
        <!-- Begin Modal -->
 
        <!-- End Modal -->
        <!-- Begin Vendor Js -->
        <script src="Public/assets/vendors/js/base/jquery.min.js"></script>
        <script src="Public/assets/vendors/js/base/core.min.js"></script>
        <!-- End Vendor Js -->
        <!-- Begin Page Vendor Js -->
        <script src="Public/assets/vendors/js/nicescroll/nicescroll.min.js"></script>
        <script src="Public/assets/vendors/js/chart/chart.min.js"></script>
        <script src="Public/assets/vendors/js/progress/circle-progress.min.js"></script>
        <script src="Public/assets/vendors/js/calendar/moment.min.js"></script>
        <script src="Public/assets/vendors/js/calendar/fullcalendar.min.js"></script>
        <script src="Public/assets/vendors/js/owl-carousel/owl.carousel.min.js"></script>
        <script src="Public/assets/vendors/js/app/app.js"></script>
        <!-- End Page Vendor Js -->
        <!-- Begin Page Snippets -->
        <script src="Public/assets/js/dashboard/db-default.js"></script>
        <!-- End Page Snippets -->
    </body>
</html>