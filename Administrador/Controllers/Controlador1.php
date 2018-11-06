<?php


class Controlador1 {

    private $enlace = '';
    private $pagina = '';

    public function cargarPlantilla() {

        session_start();

        if( isset($_SESSION['iniciada']) ){
            include 'Views/Plantilla.php';
        }else{
            include 'Views/login.php';
        }
    }

    public function mostrarPagina(){

        if(isset($_GET['action'] )){
            $enlace = $_GET['action'];
        }else{
            $enlace = 'inicio'; 
        }

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

            $_SESSION["iniciada"] = true;
            $_SESSION["usuario"] = $respuesta["nombreUsuario"];
            $_SESSION["password"] = $respuesta["password"];
            $_SESSION["nombre"] = $respuesta["nombreAdmin"];
            $_SESSION["apellidos"] = $respuesta["apellidos"];

            echo '<script> window.location.href = "index.php?action=plantilla"; </script>';
        }else {
            echo '<script> alert("Usuario o contraseña incorrectos") </script>';
            echo '<script> window.location.href = "index.php?action=login"; </script>';
        }
    }


}