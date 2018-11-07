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

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE cupon_id = :id AND password = :contra ");

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
        $stmt = Conexion::conectar()->prepare("SELECT * FROM visitas WHERE cupon_id = :id");
        
        $stmt->bindParam(':id', $_SESSION['idCupon'] , PDO::PARAM_STR);

        //se ejecuta
        $stmt->execute();

        $r = array();

        //Se trane todos los ddatos
        $r = $stmt->FetchAll();
       
        //y finalmente se pasan al controlador para ponerlos en la vista 
        return $r;


    }

    public function obtenerMisPremios(){


        //Se prepara el query
        $stmt = Conexion::conectar()->prepare("SELECT t1.cupon_id, t2.premio_id, t2.nombrePremio , t2.descripcion ,  t1.canjeable FROM premios_cupones AS t1 INNER JOIN premios AS t2 ON t2.premio_id = t1.premio_id WHERE cupon_id = :id");
        
        $stmt->bindParam(':id', $_SESSION['idCupon'] , PDO::PARAM_STR);

        //se ejecuta
        $stmt->execute();

        $r = array();

        //Se trane todos los ddatos
        $r = $stmt->FetchAll();
       
        //y finalmente se pasan al controlador para ponerlos en la vista 
        return $r;

    }

    public function actualizarContrasena($idCupon, $contrasenaNueva){

        //Se prepara el query
        $stmt = Conexion::conectar()->prepare("UPDATE cupones SET cupon_id = :id , password = :pass");
        
        $stmt->bindParam(':id', $idCupon , PDO::PARAM_STR);
        $stmt->bindParam(':pass', $contrasenaNueva , PDO::PARAM_STR);

        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }

    }




}