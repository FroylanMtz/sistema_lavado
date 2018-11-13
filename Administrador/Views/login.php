<?php 

require_once 'Modells/Modelo1.php';
//require_once 'Modells/Modelo2.php';
require_once 'Modells/CRUD1.php';
//require_once 'Modells/CRUD2.php';
require_once 'Controllers/Controlador1.php';
//require_once 'Controllers/Controlador2.php';


// Si se oprimió el botón de "INICIAR SESION"
if (isset($_POST["btn_login"])) {
  // Se crea un objeto del tipo Controlador1
  $controlador = new Controlador1();
  // Se manda llamar al método del controlador para iniciar sesión
  $controlador->iniciarSesion();
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
        <title>DWASH - Login</title>
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
        <link rel="icon" type="image/png" sizes="32x32" href="Public/imagenes/dwash.png">
        <link rel="icon" type="image/png" sizes="16x16" href="Public/imagenes/dwash.png">
        <!-- Stylesheet -->
        <link rel="stylesheet" href="Public/assets/vendors/css/base/bootstrap.min.css">
        <link rel="stylesheet" href="Public/assets/vendors/css/base/elisyam-1.5.min.css">
        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    </head>
    <body class="bg-white">
        <!-- Begin Preloader -->
        <div id="preloader">
            <div class="canvas"> <!-- Imagen que aparece al cargar la página -->
                <img src="Public/imagenes/dwash.png" alt="logo" class="loader-logo">
                <div class="spinner"></div>   
            </div>
        </div>
        <!-- End Preloader -->
        <!-- Begin Container -->
        <div class="container-fluid no-padding h-100">
            <div class="row flex-row h-100 bg-white">
                <!-- Begin Left Content -->
                <div class="col-xl-8 col-lg-6 col-md-5 no-padding">
                    <div class="elisyam-bg background-01">
                        <div class="elisyam-overlay overlay-01"></div>
                        <div class="authentication-col-content mx-auto">
                            <h1 class="gradient-text-01">
                                DWASH ADMINISTRADOR!
                            </h1>
                            <span class="description">
                                Página administrativa DWASH 
                            </span>
                        </div>
                    </div>
                </div>
                <!-- End Left Content -->
                <!-- Begin Right Content -->
                <div class="col-xl-4 col-lg-6 col-md-7 my-auto no-padding">
                    <!-- Begin Form -->
                    <div class="authentication-form mx-auto">
                        <div class="logo-centered">
                            <a href="db-default.html"> <!-- Logo del form login-->
                                <img src="Public/imagenes/dwash.png" alt="logo">
                            </a>
                        </div>
                        <h3><center>Iniciar Sesión</center></h3><br>

                        <!-- INICIO FORM INICIAR SESIÓN -->
                        <form method="POST">

                            <!-- Nombre de usuario -->
                            <div class="group material-input">
                  <input type="text" required name="usuario">
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>Nombre de usuario</label>
                            </div>

                            <!--  Contraseña  -->
                            <div class="group material-input">
                  <input type="password" required name="password">
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>Contraseña</label>
                            </div>

                            <div class="row">                          
                            <div class="col text-right">
                               
                            </div>
                        </div>
                        <div class="sign-btn text-center">
                            <button class="btn btn-lg btn-gradient-01" name="btn_login">
                                Ingresar
                            </button>
                        </div>
                        </form>
                                               
                    </div>
                    <!-- FIN FORM INICIAR SESIÓN -->              
                </div>
                <!-- End Right Content -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Container -->    
        <!-- Begin Vendor Js -->
        <script src="Public/assets/vendors/js/base/jquery.min.js"></script>
        <script src="Public/assets/vendors/js/base/core.min.js"></script>
        <!-- End Vendor Js -->
        <!-- Begin Page Vendor Js -->
        <script src="Public/assets/vendors/js/app/app.min.js"></script>
        <!-- End Page Vendor Js -->
    </body>
</html>