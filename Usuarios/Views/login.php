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

</head>

<body background="" >
    <main>    
        <div class="section"></div>
    
        <center>
            <img class="responsive-img" style="width: 150px;" src="Public/img/logo.png" />
            <div class="section"></div>

            <h5 class="indigo-text">Inicio de sesion de usuario</h5>
            <div class="section"></div>

            <div class="container">
                <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

                    <form class="col s12" method="post">
                        <div class='row'>
                            <div class='col s12'>
                            </div>
                        </div>

                        <div class='row'>
                            <div class='input-field col s12'>
                                <input class='validate' type='email' name='email' id='email' />
                                <label for='email'>Correo</label>
                            </div>
                        </div>

                        <div class='row'>
                            <div class='input-field col s12'>
                                <input class='validate' type='password' name='password' id='password' />
                                <label for='password'>Contraseña</label>
                            </div>

                            <label style='float: right;'>
                                <a class='pink-text' href='#!'><b>¿Olvidaste tu contraseña?</b></a>
                            </label>

                        </div>

                        <br />
                        <center>
                            <div class='row'>
                                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Iniciar Sesion</button>
                            </div>
                        </center>
                    </form>
                </div>
            </div>

        </center>

        <div class="section"></div>
        <div class="section"></div>
    </main>

    <script type="text/javascript" src="Public/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="Public/js/materialize.min.js"></script>

</body>

</html>