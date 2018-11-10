<?php
//Pagina que se manda llamar cuando se presiona el boton de cerrar sesion, solamente destruye la sesion actual con todas sus variables
session_destroy();

//y redirecciona el trafico de la aplicacion hacia el archivo index.php, el cual redireccionara al archivo login.php porque el controlador validará que no hay sesiones activadas
echo '<script> window.location.href = "index.php"; </script>';