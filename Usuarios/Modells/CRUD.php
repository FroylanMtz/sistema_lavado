<?php

require_once 'Conexion.php';

class Datos extends Conexion{

    public function obtenerHorario(){

        //Se prepara el query
        $stmt = Conexion::conectar()->prepare("SELECT * FROM horarios");

        //se ejecuta
        $stmt->execute();

        $r = array();

        //Se trane todos los ddatos
        $r = $stmt->FetchAll();
       
        //y finalmente se pasan al controlador para ponerlos en la vista 
        return $r;

    }

    public function validarUsuario($datos, $tabla){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE cliente_id = :id AND password = :contra ");

        $stmt->bindParam(':id', $datos['id'], PDO::PARAM_STR);
        $stmt->bindParam(':contra', $datos['contrasena'], PDO::PARAM_STR);

        $stmt->execute();

        $r = array();

        $r = $stmt->fetch(PDO::FETCH_ASSOC);

        return $r;

    }

    public function obtenerPremios(){
        
        //Se prepara el query
        $stmt = Conexion::conectar()->prepare("SELECT * FROM premios");

        //se ejecuta
        $stmt->execute();

        $r = array();

        //Se trane todos los ddatos
        $r = $stmt->FetchAll();
       
        //y finalmente se pasan al controlador para ponerlos en la vista 
        return $r;

    }

    public function obtenerVisitas(){


        //Se prepara el query
        $stmt = Conexion::conectar()->prepare("SELECT * FROM visitas WHERE cliente_id = :id");

        $stmt->bindParam(':id', $_SESSION['idUsuario'] , PDO::PARAM_INT);

        //se ejecuta
        $stmt->execute();

        $r = array();

        //Se trane todos los ddatos
        $r = $stmt->FetchAll();
       
        //y finalmente se pasan al controlador para ponerlos en la vista 
        return $r;


    }




}