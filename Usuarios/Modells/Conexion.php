<?php

//clase encargada de la conexion a la bae de datos del sistema de esta hereda la clase que realiza los cruds
class Conexion{

    public function conectar(){

        $pdo = new PDO('mysql:host=localhost;dbname=sistema_lavado', 'admin', 'f65b98dfbe2057a5ccf3122b6f69ef35328fe67ac9f9118b');
        return $pdo;

    }

}