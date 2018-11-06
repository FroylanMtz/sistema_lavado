<?php


class Controlador {

    private $enlace = '';
    private $pagina = '';

    public function cargarPlantilla(){

        session_start();

        if( isset($_SESSION['iniciada']) ){
            include 'Views/Plantilla.php';
        }else{
            include 'login.php';
        }

    }

    public function mostrarPagina(){

        if(isset($_GET['pagina'] )){
            $enlace = $_GET['pagina'];
        }else{
            $enlace = 'inicio'; 
        }

        $pagina = Modelo::mostrarPagina($enlace);

        include $pagina;

    }

    public function iniciarSesion()
    {

        if( isset($_POST['id']) && isset( $_POST['contrasena'] ))
        {

            $datos = array( 'id'      => $_POST['id'],
                            'contrasena'  => $_POST['contrasena']);
            

            $respuesta = Datos::validarUsuario($datos, 'clientes');

            
            if( $respuesta )
            {
                session_start();
                $_SESSION['iniciada'] = true;
                $_SESSION['nombre'] = $respuesta['nombreCliente'];
                $_SESSION['idUsuario'] = $respuesta['cliente_id'];
                $_SESSION['foto'] = $respuesta['foto'];

                echo '<script> window.location.href = "index.php?action=jugadores"; </script>';
            }else
            {
                echo '<script> alert("Correo o contraseña incorrectos") </script>';
                echo '<script> window.location.href = login.php"; </script>';
            }

        }
        
    }


    public function obtenerHorario(){

        $datosHorarios = array();

        $datosHorarios = Datos::obtenerHorario();

        return $datosHorarios;

    }

    public function obtenerPremios(){

        $datosPremios = array();

        $datosPremios = Datos::obtenerPremios();

        return $datosPremios;

    }

    public function obtenerVisitas(){

        $datosVisitas = array();

        $datosVisitas = Datos::obtenerVisitas();

        return $datosVisitas;

    }



}