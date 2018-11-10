<?php

//Se hace el requerimiento del archivo en donde se realiza la conexion
require_once 'Conexion.php';

//La clase la cual adminsitrara los datos hereda de esta clase para poder acceder a sus metodos
class Datos extends Conexion{

    //Funcion que se enarga de traer los datos de la tabla horarios los cuales indican el horario de servicio del establecimiento
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

    //Funcion que se encarga de recibir los datos del controlador en donde se valida si un usuario esta registrado y puede acceder al sistema
    public function validarUsuario($datos, $tabla){

        //Se prepara la conexion pasandole como parametro el query y se puede ver que se van a traer los datos que coincidan con el id del cupon que intenta loggearse y la contraseña puestas en el fomulario de la pagina de "login.php"
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE cupon_id = :id AND password = :contra ");

        //Se pasan los parametros con la informacion dicha arriba
        $stmt->bindParam(':id', $datos['id'], PDO::PARAM_STR);
        $stmt->bindParam(':contra', $datos['contrasena'], PDO::PARAM_STR);

        //se ejecuta el query
        $stmt->execute();

        //se declara un arreglo para guardar los datos que posiblemte regrese dicha query
        $r = array();

        //Se llena el arreglo con la informacion traida por la query
        $r = $stmt->fetch(PDO::FETCH_ASSOC);

        //re regresa al controlador, el controlador valida si existen los datos, o si el arreglo esta vacio.
        return $r;

    }

    //Funcion que se encarga de trar los datos almacenados en los premios, en la tabla premios, dichos pemios son solo los que estan disponibles para la obtencion no los que ya tiene dispoinible le usuario para canjearlos
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

    //Funcion que se encarga de obtener las visitas realizadas por el dueño del cupon, dichas visitan se agregan cuando el usuario realiza una compra en el establecimiento, la persona encargada de insertar estas visitas son los adminsitradores.
    public function obtenerVisitas(){


        //Se prepara el query
        $stmt = Conexion::conectar()->prepare("SELECT * FROM visitas WHERE cupon_id = :id");
        
        //Se pasan los parametros con el id del cupon que esta actualmente loggeado
        $stmt->bindParam(':id', $_SESSION['idCupon'] , PDO::PARAM_STR);

        //se ejecuta
        $stmt->execute();

        $r = array();

        //Se trane todos los ddatos
        $r = $stmt->FetchAll();
       
        //y finalmente se pasan al controlador para ponerlos en la vista 
        return $r;


    }

    //Funcion para obtener los permiso a ahora si del usuario dueño del cupon, es decir los que tiene disponibles para canje que obtuvo alcanzando la meta se visitas planteadas por el premios, de igual forma los boletas que ya ha usado
    public function obtenerMisPremios(){


        //Se prepara el query, vemos que es uan union de variables tablas, para mostrar toda la informacion necesaria,
        $stmt = Conexion::conectar()->prepare("SELECT t1.cupon_id, t2.premio_id, t2.nombrePremio , t2.descripcion ,  t1.canjeable FROM premios_cupones AS t1 INNER JOIN premios AS t2 ON t2.premio_id = t1.premio_id WHERE cupon_id = :id");
        
        //Se le pasa el parametro, que es el id del cupon actualemte loggeado
        $stmt->bindParam(':id', $_SESSION['idCupon'] , PDO::PARAM_STR);

        //se ejecuta
        $stmt->execute();

        //Se declara un arreglo en el cual se va a alamcenar informacion proveniente de la query a la bd
        $r = array();

        //Se trane todos los ddatos
        $r = $stmt->FetchAll();
       
        //y finalmente se pasan al controlador para ponerlos en la vista 
        return $r;

    }

    //Funcion que se usa para cambiar la contraseña del usuario en cuestion, para ello requiere dos parametros, el id del cupon que se quiere cambiar, que siempre sera el actual, y la contraseña nueva que se quiere configurar
    public function actualizarContrasena($idCupon, $contrasenaNueva){

        //Se prepara el query de actualizacion con dos parametros 
        $stmt = Conexion::conectar()->prepare("UPDATE cupones SET password = :pass WHERE cupon_id = :id ");
        
        //Se pasan los parametros que de igual forma son los parametros pasados en la funcion
        $stmt->bindParam(':id', $idCupon , PDO::PARAM_STR);
        $stmt->bindParam(':pass', $contrasenaNueva , PDO::PARAM_STR);


        //Si se actualizo correctamente o no se le avisa al controlador para que éste le avise a la vista con un bonito mensaje
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }

    }

    public function obtenerPromociones(){

        //Se prepara el query, vemos que es uan union de variables tablas, para mostrar toda la informacion necesaria,
        $stmt = Conexion::conectar()->prepare("SELECT * FROM promociones");
        
        //se ejecuta
        $stmt->execute();

        //Se declara un arreglo en el cual se va a alamcenar informacion proveniente de la query a la bd
        $r = array();

        //Se trane todos los ddatos
        $r = $stmt->FetchAll();
       
        //y finalmente se pasan al controlador para ponerlos en la vista 
        return $r;

    }




}