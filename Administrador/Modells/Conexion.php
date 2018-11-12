<?php

/**
*	Clase conexión que contiene el método para conectarse a la base de datos
*/

class Conexion{

    public function conectar(){
    	// Se conecta a la BD por PDO
        $pdo = new PDO('mysql:host=localhost;dbname=sistema_lavado', 'admin', 'f65b98dfbe2057a5ccf3122b6f69ef35328fe67ac9f9118b');
        $pdo->exec("SET CHARACTER SET utf8"); // Se establece el encoding
        return $pdo; // Se retorna el objeto de tipo PDO
    }

}