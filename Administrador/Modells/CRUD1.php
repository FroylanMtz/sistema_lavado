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
}