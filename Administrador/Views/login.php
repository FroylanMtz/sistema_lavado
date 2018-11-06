<?php 

require_once 'Modells/Modelo1.php';
require_once 'Modells/Modelo2.php';
require_once 'Modells/CRUD1.php';
require_once 'Modells/CRUD2.php';
require_once 'Controllers/Controlador1.php';
require_once 'Controllers/Controlador2.php';

?>

<html>

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">-->
    <link rel="stylesheet" type="text/css" href="Public/css/materialize.min.css" />

    <link rel="stylesheet" type="text/css" href="Public/css/login.css" />

</head>

<body background="" >
  <div class="section"></div>
  <main>
    <center>
      <img class="responsive-img" style="width: 250px;" src="Public/img/logo_2.png" />
      <div class="section"></div>

      <h5 class="indigo-text">Inicio de sesion</h5>
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