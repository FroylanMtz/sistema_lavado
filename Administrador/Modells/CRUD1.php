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

}