<?php

require_once 'Conexion.php';

class crud1 extends Conexion{

    public function iniciarSesion($usuario, $password) {
    	$sql = "SELECT * FROM administradores WHERE nombreUsuario=? AND password=?";
    	$stmt = Conexion::conectar()->prepare($sql);

    	$stmt->execute([$usuario,$password]);

    	$respuesta = $stmt->fetchAll(PDO::FETCH_ASSOC);

    	if($respuesta) return $respuesta;
    	else return false;
    }

    # Traer todos los datos de una tabla
    	// ------------------------------------
    public function getAll($tabla) {
    	// Consulta sql, trae todo de $tabla
    	$sql = "SELECT * FROM $tabla";
    	// Se prepara la consulta
    	$stmt = Conexion::conectar()->prepare($sql);
    	// se ejecuta
    	$stmt->execute();

    	// Se guarda en una variable un array asciativo con todos los resultados
    	$respuesta = $stmt->fetchAll(PDO::FETCH_ASSOC);
    	// Se retorna el array
    	return $respuesta;
    }

}