<?php

require_once 'Conexion.php';

class crud2 extends Conexion{

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
    	$respuesta = $stmt->fetchAll();
    	// Se retorna el array
    	return $respuesta;
    }

	//Metodo de registro de Promociones
    public static function registroPromocionesModel($datosModel, $tabla){
    	//consulta para obtener el valor de las variables cuando ejecutamos execute
		$stmt = Conexion::conectar()->prepare ("INSERT INTO $tabla (promocion_id, nombrePromocion,descripcion) VALUES (:promocion_id,:nombrePromocion,:descripcion)");
		//hacemos referencia a las variables que tenemos vinculadas
		$stmt->bindParam(":promocion_id",$datosModel["promocion_id"], PDO::PARAM_INT);
		$stmt->bindParam(":nombrePromocion",$datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion",$datosModel["descripcion"], PDO::PARAM_STR);

		//esas variables anteriores son ejecutadas con execute
		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}
		$stmt->close(); //cierre
	}

	//Metodo de registro de Cupones
	public static function registroCuponesModel($datosModel, $tabla){
		//consulta para obtener el valor de las variables cuando ejecutamos execute
		$stmt = Conexion::conectar()->prepare ("INSERT INTO $tabla (cupon_id, password, expiracion) VALUES (:cupon_id,:password,:expiracion)");
		//hacemos referencia a las variables que tenemos vinculadas
		$stmt->bindParam(":cupon_id",$datosModel["cupon_id"], PDO::PARAM_INT);
		$stmt->bindParam(":password",$datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":expiración",$datosModel["expiración"], PDO::PARAM_INT);

		//esas variables anteriores son ejecutadas con execute
		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}
			$stmt->close();//cierre
	}

	//Metodo de registro de Premios
	public static function registroPremiosModel($datosModel, $tabla){
		//consulta para obtener el valor de las variables cuando ejecutamos execute
		$stmt = Conexion::conectar()->prepare ("INSERT INTO $tabla (premio_id, nombrePremio,descripcion, visitasRequeridas) VALUES (:premio_id,:nombrePremio,:descripcion,:visitasRequeridas)");
		//hacemos referencia a las variables que tenemos vinculadas
		$stmt->bindParam(":premio_id",$datosModel["premio_id"], PDO::PARAM_INT);
		$stmt->bindParam(":nombrePremio",$datosModel["nombrePremio"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion",$datosModel["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":visitasRequeridas",$datosModel["visitasRequeridas"], PDO::PARAM_INT);
		//esas variables anteriores son ejecutadas con execute
		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}
		$stmt->close();//cierre
	}

	//Metodo de registro de Horarios
	public static function registroHorariosModel($datosModel, $tabla){
		//consulta para obtener el valor de las variables cuando ejecutamos execute
		$stmt = Conexion::conectar()->prepare ("INSERT INTO $tabla (horario_id, horario) VALUES (:horario_id,:horario)");
		//hacemos referencia a las variables que tenemos vinculadas
		$stmt->bindParam(":horario_id",$datosModel["horario_id"], PDO::PARAM_INT);
		$stmt->bindParam(":horario",$datosModel["horario"], PDO::PARAM_STR);
		//esas variables anteriores son ejecutadas con execute
		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}
		$stmt->close();//cierre
	}

	//✿✿✿✿✿✿✿VISTAS✿✿✿✿✿✿//

	static public function vistaPromocionesModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();
	
		$stmt->close();	
	}

	static public function vistaCuponesModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();
	
		$stmt->close();	
	}

	static public function vistaPremiosModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();
	
		$stmt->close();	
	}

	static public function vistaHorariosModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();
	
		$stmt->close();	
	}

	//✩ Funcion de get para Promociones ✩
	static public function getPromocionesModel(){
		$promociones = Conexion::conectar()->prepare("SELECT * FROM promociones");
		$promociones->execute();
		return $promociones->fetchAll();
	}

	//✩ Funcion de get para Cupones ✩
	static public function getCuponesModel(){
		$cupones = Conexion::conectar()->prepare("SELECT * FROM cupones");
		$cupones->execute();
		return $cupones->fetchAll();
	}


	//✩ Funcion de editar Promociones ✩
	static public function editarPromocionModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT promocion_id, nombrePromocion, descripcion FROM $tabla WHERE promocion_id = :promocion_id");
		$stmt->bindParam(":promocion_id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
	}

	//✩ Funcion de editar Cupones ✩
	static public function editarCuponModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT cupon_id, password, expiración FROM $tabla WHERE cupon_id = :cupon_id");
		$stmt->bindParam(":cupon_id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
	}

	//✩ Funcion de editar Premios ✩
	static public function editarPremioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT premio_id, nombrePremio, descripcion, visitasRequeridas FROM $tabla WHERE premio_id = :premio_id");
		$stmt->bindParam(":premio_id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
	}


	//✩ Funcion de Actualizar Promocion ✩
	static public function actualizarPromocionModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombrePromocion = :nombrePromocion, descripcion = :descripcion WHERE promocion_id = :promocion_id");

		$stmt->bindParam(":nombrePromocion", $datosModel["nombrePromocion"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":promocion_id", $datos2Model["promocion_id"], PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}

		else{
			return "error";
		}
		$stmt->close();
	}

	//✩ Funcion de Actualizar cupon ✩
	static public function actualizarCuponModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET password = :password, expiración = :expiración WHERE cupon_id = :cupon_id");

		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":expiración", $datosModel["expiración"], PDO::PARAM_STR);
		$stmt->bindParam(":cupon_id", $datosModel["cupon_id"], PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}

		else{
			return "error";
		}
		$stmt->close();
	}

	//✩ Funcion de borrar promocion ✩
	static public function borrarPromocionModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE promocion_id = :promocion_id");
		$stmt->bindParam(":promocion_id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}
		else{
		return "error";
		}
		$stmt->close();
	}

	//✩ Funcion de borrar cupon ✩
	static public function borrarCuponModel($datosModel,$tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE cupon_id = :cupon_id");
		$stmt->bindParam(":cupon_id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}
		else{
		return "error";
		}
		$stmt->close();
	}


	//✩ Funcion de borrar premio ✩
	static public function borrarPremioModel($datosModel,$tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE premio_id = :premio_id");
		$stmt->bindParam(":premio_id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}
		else{
		return "error";
		}
		$stmt->close();
	}
}