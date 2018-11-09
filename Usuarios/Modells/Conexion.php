<?php

//clase encargada de la conexion a la bae de datos del sistema de esta hereda la clase que realiza los cruds
class Conexion{

    public function conectar(){

        $pdo = new PDO('mysql:host=localhost;dbname=sistema_lavado', 'root', '');
        return $pdo;

    }

}