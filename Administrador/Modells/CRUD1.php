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


    # USUARIOS (ADMINISTRADORES) ------------------------------------
        # ---------------------
    // Método para guardar los datos de un nuevo usuario
    public function agregarUsuario($datosUsuario) {
        // Consulta sql para insertar en la tabla administradores
        $sql = "INSERT INTO administradores (nombreUsuario,password,nombreAdmin,apellidos,telefono,correo,foto) VALUES (?,?,?,?,?,?,?)";
        // Se prepara la consulta
        $stmt = Conexion::conectar()->prepare($sql);

        // Si se ejecuta con éxito retorna el resultado correspondiente al modelo
        // Se pasan como parámetros de la función execute() los datos del usuario
        if($stmt->execute([$datosUsuario["usuario"],
                            $datosUsuario["password"],
                            $datosUsuario["nombre"],
                            $datosUsuario["apellidos"],
                            $datosUsuario["telefono"],
                            $datosUsuario["correo"],
                            $datosUsuario["foto"]])){
            return "success";
        }else{
            return "false";
        }
    }


    // Método para editar los datos de un usuario
    public function editarUsuario ($datosUsuario) {
        // consulta sql
        $sql = "UPDATE administradores SET password=?, nombreAdmin=?, apellidos=?, telefono=?, correo=?, foto=? WHERE admin_id=?";
        // Se prepara la consulta
        $stmt = Conexion::conectar()->prepare($sql);
        // Se ejecuta y se verifica si se ejecuta con éxito
        // Se pasan todos los valores de los datos del usuario
        if($stmt->execute([$datosUsuario["password"],
                            $datosUsuario["nombre"],
                            $datosUsuario["apellidos"],
                            $datosUsuario["telefono"],
                            $datosUsuario["correo"],
                            $datosUsuario["foto"],
                            $datosUsuario["admin_id"]])){
            return "success";
        }else{
            return false;
        }
    }


    // Método para obtener los datos de un usuario específico y enviarlos al controlador
    public function getAdminById($admin_id) {
        // Consulta sql
        $sql = "SELECT * FROM administradores WHERE admin_id=?";
        // Se prepara la consulta
        $stmt = Conexion::conectar()->prepare($sql);
        // Se ejecuta, se pasa como parámetro el id del admin
        $stmt->execute([$admin_id]);

        // Se almacena el resultado en un array asociativo
        $respuesta = $stmt->fetch(); // fetch solo trae un registro

        // Si el arreglo no está vacío se retorna, sino devuelve false
        if($respuesta) return $respuesta;
        else return false;
    }

    // Método para eliminar un usuario de la BD, se recibe como parámetro el id del usuario
    public function eliminarUsuario($admin_id) {
        // Consulta sql
        $sql = "DELETE FROM administradores WHERE admin_id=?";
        // Se prepara la consulta
        $stmt = Conexion::conectar()->prepare($sql);

        // Si se ejecuta con éxito devuelve true
        if ($stmt->execute([$admin_id])) return true;
        else return false;
    }


    # CUPONES ---------------------------------
        // -------------------
    // Método para generar un cupón. Parámetros: id, password y fecha de expiración
    public function generarCupon($id, $password, $expiracion) {
        // Consulta sql
        $sql = "INSERT INTO cupones (cupon_id,password,expiracion) VALUES (?,?,?)";
        // Se prepara la consulta
        $stmt = Conexion::conectar()->prepare($sql);

        // Si se ejecuta con éxito devuelve true. Se pasan las tres variables como parametros
        if($stmt->execute([$id,$password,$expiracion])) return true;
        else return false;
    }

    // Método para canjear cupon (Parámetros: id del premio y del cupón)
    public function canjearCupon($premio_id, $cupon_id) {
        $canjeable="NO";
        // sql
        $sql = "UPDATE premios_cupones SET canjeable=? WHERE premio_id=? AND cupon_id=?";
        // Se prepara la consulta
        $stmt = Conexion::conectar()->prepare($sql);

        // Se ejecuta la consulta y se verifica si se realizó con éxito
        if($stmt->execute([$canjeable,$premio_id,$cupon_id])) return true;
        else return false;
    }



    # VISITAS ----------------------------------
        # -----------------------
    // Método para agregar una visita (Parámetro: fecha actual, id del cupón)
    public function agregarVisita($fecha,$cupon_id) {
        // Consulta sql
        $sql = "INSERT INTO visitas (fecha,cupon_id) VALUES (?,?)";
        // Se prepara la consulta
        $stmt = Conexion::conectar()->prepare($sql);
        // Si se ejecuta con éxito devuelve true sino false
        if($stmt->execute([$fecha,$cupon_id])) return true;
        else return false;
    }

    // Método para conocer el # de visitas de un cupón (Parámetros: id del cupón)
    public function numeroVisitas($cupon_id) {
        // Consulta sql
        $sql = "SELECT COUNT(*) as totalVisitas FROM visitas WHERE cupon_id=?";
        // Se prepara la consulta
        $stmt = Conexion::conectar()->prepare($sql);
        // Se ejecuta
        $stmt->execute([$cupon_id]);

        $respuesta =  $stmt->fetchAll();

        // se retorna el número de visitas
        return $respuesta[0]['totalVisitas'];
    }


    # PREMIOS - CUPONES ----------------------------------
        # ----------------------------
    // Método para asignar un premio a un cupón(Parámetros: ID cupón, ID premio y # de visitas)
    public function agregarPremio($premio_id,$cupon_id,$canjeable) {                

        // Consulta sql
      $sql = "INSERT INTO premios_cupones (premio_id,cupon_id,canjeable) VALUES (?,?,?)";
      // Se prepara la consulta
      $stmt = Conexion::conectar()->prepare($sql);
      // Se ejecuta
      $stmt->execute([$premio_id,$cupon_id,$canjeable]);
    }


    // Método para verificar si un cupón es merecedor de un premio, si es así
    // agrega el is del premio y del cupón en la tabla premios_cupones
    // (Parámetro: # de visitas)
    public function verificarPremio($cupon_id,$numVisitas) {
        // Consulta sql
        $sql = "SELECT * FROM premios";
        // Se prepara la consulta
        $stmt = Conexion::conectar()->prepare($sql);
        // Se ejecuta
        $stmt->execute();
        // Se guarda el array traido
        $premios = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Se verifica con un foreach que si el cupon ya es merecedor de un premio
        foreach($premios as $premio):
            if($numVisitas == $premio["visitasRequeridas"]){
                // Se establece este valor desde inicio para saber que
                // que se puede camjear
                $canjeable = "SI";
                
                // si se cumple se manda llamar la función para agregar el id del cupón
                // y del premio a la tabla premios_cupones
                self::agregarPremio($premio["premio_id"],$cupon_id,$canjeable);                 
            }
        endforeach;
    }


    // Método para obtener los premios (ganados) de los diferentes cupones
    // inner join de las tablas premios y premios cupones
    // Parámetro: ID del cupón
    public function obtenerPremiosCupones($cupon_id) {
        // Consulta sql
        $sql = "SELECT * FROM premios INNER JOIN premios_cupones ON premios.premio_id=premios_cupones.premio_id AND premios_cupones.cupon_id=?";
        // Se prepara la consulta
        $stmt = Conexion::conectar()->prepare($sql);
        // Se ejecuta la consulta
        $stmt->execute([$cupon_id]);

        // Se guardan los datos como un array asociativo
        $respuesta = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Se retorna la respuesta
        return $respuesta;
    }


    # NUMERO DE REGISTROS -{---------------------------}
        # ----------------------
    // Contar usuarios
    public function numeroUsuarios() {
        // sql
        $sql = "SELECT COUNT(*) as admin FROM administradores";        
        // Se prepara la consulta
        $stmt = Conexion::conectar()->prepare($sql);
        // Se ejecuta
        $stmt->execute();

        $respuesta =  $stmt->fetchAll();

        // se retorna el número de visitas
        return $respuesta[0]['admin'];        
    }

     // Contar Cupones
    public function numeroCupones() {
         // sql
        $sql = "SELECT COUNT(*) as cupon FROM cupones";        
        // Se prepara la consulta
        $stmt = Conexion::conectar()->prepare($sql);
        // Se ejecuta
        $stmt->execute();

        $respuesta =  $stmt->fetchAll();

        // se retorna el número de visitas
        return $respuesta[0]['cupon'];
    }

     // Contar Visitas
    public function numeroDeVisitas() {
        // sql
        $sql = "SELECT COUNT(*) as visita FROM visitas";        
        // Se prepara la consulta
        $stmt = Conexion::conectar()->prepare($sql);
        // Se ejecuta
        $stmt->execute();

        $respuesta =  $stmt->fetchAll();

        // se retorna el número de visitas
        return $respuesta[0]['visita'];
    }

    // Contar Promociones
    public function numeroPromociones() {
        // sql
        $sql = "SELECT COUNT(*) as promocion FROM promociones";        
        // Se prepara la consulta
        $stmt = Conexion::conectar()->prepare($sql);
        // Se ejecuta
        $stmt->execute();

        $respuesta =  $stmt->fetchAll();

        // se retorna el número de visitas
        return $respuesta[0]['promocion'];
    }

    // Contar Premios
    public function numeroPremios() {
        // sql
        $sql = "SELECT COUNT(*) as premio FROM premios";        
        // Se prepara la consulta
        $stmt = Conexion::conectar()->prepare($sql);
        // Se ejecuta
        $stmt->execute();

        $respuesta =  $stmt->fetchAll();

        // se retorna el número de visitas
        return $respuesta[0]['premio'];
    }

    // Contar Horarios
    public function numeroHorarios() {
        // sql
        $sql = "SELECT COUNT(*) as horario FROM horarios";        
        // Se prepara la consulta
        $stmt = Conexion::conectar()->prepare($sql);
        // Se ejecuta
        $stmt->execute();

        $respuesta =  $stmt->fetchAll();

        // se retorna el número de visitas
        return $respuesta[0]['horario'];
    }
}