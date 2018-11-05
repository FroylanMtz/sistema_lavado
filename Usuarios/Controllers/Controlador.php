<?php


class Controlador {

    private $enlace = '';
    private $pagina = '';

    public function cargarPlantilla(){

        //session_start();

        //if( isset($_SESSION['iniciada']) ){
            include 'Views/Plantilla.php';
        //}else{
            //include 'Views/login.php';
        //}

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

}