<?php

require_once 'Conexion.php';

class crud2 extends Conexion{

	//Metodo de registro de Promociones
    public static function registroPromocionesModel($datosModel, $tabla){
    	//consulta para obtener el valor de las variables cuando ejecutamos execute
		$stmt = Conexion::conectar()->prepare ("INSERT INTO $tabla (promocion_id, nombrePromocion,descripcion) VALUES (:promocion_id,:nombrePromocion,:descripcion)");
		//hacemos referencia a las variables que tenemos vinculadas
		$stmt->bidParam(":promocion_id",$datosModel["promocion_id"], PDO::PARAM_INT);
		$stmt->bidParam(":nombrePromocion",$datosModel["nombrePromocion"], PDO::PARAM_STR);
		$stmt->bidParam(":descripcion",$datosModel["descripcion"], PDO::PARAM_STR);

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
		$stmt = Conexion::conectar()->prepare ("INSERT INTO $tabla (cupon_id, password,cliente_id,premio_id, expiracion) VALUES (:cupon_id,:password,:cliente_id,:premio_id,:expiracion)");
		//hacemos referencia a las variables que tenemos vinculadas
		$stmt->bidParam(":cupon_id",$datosModel["cupon_id"], PDO::PARAM_INT);
		$stmt->bidParam(":password",$datosModel["password"], PDO::PARAM_STR);
		$stmt->bidParam(":cliente_id",$datosModel["cliente_id"], PDO::PARAM_INT);
		$stmt->bidParam(":premio_id",$datosModel["premio_id"], PDO::PARAM_INT);
		$stmt->bidParam(":expiración",$datosModel["expiración"], PDO::PARAM_INT);

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
		$stmt->bidParam(":premio_id",$datosModel["premio_id"], PDO::PARAM_INT);
		$stmt->bidParam(":nombrePremio",$datosModel["nombrePremio"], PDO::PARAM_STR);
		$stmt->bidParam(":descripcion",$datosModel["descripcion"], PDO::PARAM_STR);
		$stmt->bidParam(":visitasRequeridas",$datosModel["visitasRequeridas"], PDO::PARAM_INT);
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
		$stmt->bidParam(":horario_id",$datosModel["horario_id"], PDO::PARAM_INT);
		$stmt->bidParam(":horario",$datosModel["horario"], PDO::PARAM_STR);
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
		$equipos = Conexion::conectar()->prepare("SELECT * FROM promociones");
		$equipos->execute();
		return $equipos->fetchAll();
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

		$stmt = Conexion::conectar()->prepare("SELECT cupon_id, password, cliente_id, premio_id, expiración FROM $tabla WHERE cupon_id = :cupon_id");
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
		$stmt->bindParam(":promocion_id", $datosModel["promocion_id"], PDO::PARAM_INT);

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

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET password = :password, cliente_id = :cliente_id, premio_id = :premio_id, expiración = :expiración WHERE cupon_id = :cupon_id");

		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":cliente_id", $datosModel["cliente_id"], PDO::PARAM_INT);
		$stmt->bindParam(":premio_id", $datosModel["premio_id"], PDO::PARAM_INT);
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

}