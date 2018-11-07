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
