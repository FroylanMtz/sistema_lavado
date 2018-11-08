<?php 

require_once 'Modells/Modelo.php';
require_once 'Modells/CRUD.php';
require_once 'Controllers/Controlador.php';

?>

<html>

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Public/css/materialize.min.css" />
    <link rel="stylesheet" type="text/css" href="Public/css/login.css" />

    <script src="Public/js/sweetalert2.all.min.js"> </script>

    <style> 
        body{
            background: lightgray;
        }
    </style>

</head>

<body >

    <header>
        
        <nav>
            <div class="nav-wrapper blue darken-4">
                <a href="index.php?pagina=inicio" class="brand-logo"> <img src="Public/img/logo.png" alt="" width="60px" height="60px"> </a>
                
            </div>
        </nav>
    </header>

    <main>    
        <div class="section"></div>
    
        <center>
            <h4 class="indigo-text">Inicio de sesion de usuario</h4>
            <div class="section"></div>

            <div class="container">
                <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

                    <form class="col s12" method="post">
                        <div class='row'>
                            <div class='col s12'>
                            </div>
                        </div>

                        <div class='row'>
                            <div class='input-field col s12 '>
                                <input class='validate' type='text' name='id' id='id' />
                                <label for='id'>Id</label>
                            </div>
                        </div>

                        <div class='row'>
                            <div class='input-field col s12'>
                                <input class='validate' type='password' name='contrasena' id='contrasena' />
                                <label for='contrasena'>Contraseña</label>
                            </div>

                            <label style='float: left;'>
                                <a class='pink-text' href='#!'><b>Estas credenciales son proporcionadas por el admin</b></a>
                            </label>

                        </div>

                        <br />
                        <center>
                            <div class='row'>
                                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect blue darken-4'>Iniciar Sesion</button>
                            </div>
                        </center>
                    </form>
                </div>
            </div>

        </center>

        <div class="section"></div>
        <div class="section"></div>
    </main>

    <footer class="page-footer blue darken-4">
        <div class="footer-copyright">
            <div class="container">
                
            
            </div>
        </div>
    </footer>

    <script type="text/javascript" src="Public/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="Public/js/materialize.min.js"></script>

</body>

</html>

<?php
    $controlador= new Controlador();

    $controlador -> iniciarSesion();
?>