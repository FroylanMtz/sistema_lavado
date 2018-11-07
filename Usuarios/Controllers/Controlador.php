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
            

            $respuesta = Datos::validarUsuario($datos, 'cupones');

            
            if( $respuesta )
            {
                session_start();
                $_SESSION['iniciada'] = true;
                $_SESSION['idCupon'] = $respuesta['cupon_id'];
                $_SESSION['contrasena'] = $respuesta['password'];

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

    public function obtenerMisPremios(){


        $datosMisPremios = array();

        $datosMisPremios = Datos::obtenerMisPremios();

        return $datosMisPremios;

    }

    public function obtenerVisitas(){

        $datosVisitas = array();

        $datosVisitas = Datos::obtenerVisitas();

        return $datosVisitas;

    }

    public function actualizarContrasena(){

        $contrasenaActual = $_POST['contrasenaActual'];
        $contrasenaNueva = $_POST['contrasenaNueva'];
        $idCupon = $_SESSION['idCupon'];

        if($contrasenaActual == $_SESSION['contrasena']){
            //echo 'Las contraseñas coinciden';

            $respuesta = Datos::actualizarContrasena($idCupon, $contrasenaNueva);

            if($respuesta == "success"){
            
                echo '<script> 
                        alert("Datos editados correctamente");
                        window.location.href = "index.php?pagina=salir"; 
                      </script>';
                
            }else{
                echo '<script> alert("Error al editar") </script>';
            }

        }else{
            echo '<script> alert("Las contraseña actual no coincide") </script>';
        }

        //$respuesta = Datos::

    }


    public function obtenerPromociones(){


        $datosVisitas = array();

        $datosVisitas = Datos::obtenerVisitas();

        return $datosVisitas;

    }



}