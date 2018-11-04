<?php

class Conexion{

    public function conectar(){

        $pdo = new PDO('mysql:host=localhost;dbname=sistema_lavado', 'root', '');
        return $pdo;

    }

}