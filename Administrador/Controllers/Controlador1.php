<?php


class Controlador1 {

    // Variables miembro de la clase
    private $enlace = '';
    private $pagina = '';

    public function cargarPlantilla() {

        // Se inicia la sesión
        session_start();

        // Si la variable de sesión está iniciada se incluye la plantilla, de lo contrario
        // se direcciona al login
        if( isset($_SESSION['iniciada']) ){
            include 'Views/Plantilla.php';
        }else{
            include 'Views/login.php';
        }
    }

    // Se muestra la página dependiendo de la variable GET - action
    public function mostrarPagina(){

        if(isset($_GET['action'] )){
            $enlace = $_GET['action'];
        }else{
            $enlace = 'inicio'; 
        }

        // Se llama al método del modelo que regresa la ruta del archivo a incluir
        $pagina = Modelo1::mostrarPagina($enlace);

        include $pagina;
    }


    # INICIAR SESIÓN --------------------------------
        # ---------------------
    // Método que toma los datos del form de login y recibe la validación del modelo
    public function iniciarSesion() {
        // Se recibe la respuesta del modelo, se pasan el nombre de usuario
        // y contraseña del admin traido del form
        $respuesta = crud1::iniciarSesion($_POST["usuario"], $_POST["password"]);
        
        // Si los datos ingresados son correctos se inicia la sesion (session_start())
        if($respuesta) {
            session_start();

            $_SESSION["iniciada"] = true; // para comparar si está iniciada la sesión
            // Se guarda el nombre de usuario, contraseña, nombre y apellidos
            // del admin en las variables de sesión $_SESSION
            $_SESSION["usuario"] = $respuesta["nombreUsuario"];             
            $_SESSION["password"] = $respuesta["password"];
            $_SESSION["nombre"] = $respuesta["nombreAdmin"];
            $_SESSION["apellidos"] = $respuesta["apellidos"];

            // Se direcciona a la plantilla o navegación principal
            echo '<script> window.location.href = "index.php?action=plantilla"; </script>';
        }else {
            // Si se ingresaron datos del usuario incorrectos se dirije al login
            echo '<script> alert("Usuario o contraseña incorrectos") </script>';
            echo '<script> window.location.href = "index.php?action=login"; </script>';
        }
    }


}