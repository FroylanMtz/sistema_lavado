<?php

require_once 'Conexion.php';

class crud2 extends Conexion{

	//Metodo de registro de Promociones
    public static function registroPromocionesModel($datosModel, $tabla){
    	//consulta para obtener el valor de las variables cuando ejecutamos execute
		$stmt = Conexion::conectar()->prepare ("INSERT INTO $tabla (promocion_id, nombrePromocion,descripcion) VALUES (:promocion_id,:nombrePromocion,:descripcion)");
		//hacemos referencia a las variables que tenemos vinculadas
		$stmt->bidParam(":promocion_id",$crud2Model["promocion_id"], PDO::PARAM_INT);
		$stmt->bidParam(":nombrePromocion",$crud2Model["nombrePromocion"], PDO::PARAM_STR);
		$stmt->bidParam(":descripcion",$crud2Model["descripcion"], PDO::PARAM_STR);

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
		$stmt->bidParam(":cupon_id",$crud2Model["cupon_id"], PDO::PARAM_INT);
		$stmt->bidParam(":password",$crud2Model["password"], PDO::PARAM_STR);
		$stmt->bidParam(":expiración",$crud2Model["expiración"], PDO::PARAM_INT);

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
		$stmt->bidParam(":premio_id",$crud2Model["premio_id"], PDO::PARAM_INT);
		$stmt->bidParam(":nombrePremio",$crud2Model["nombrePremio"], PDO::PARAM_STR);
		$stmt->bidParam(":descripcion",$crud2Model["descripcion"], PDO::PARAM_STR);
		$stmt->bidParam(":visitasRequeridas",$crud2Model["visitasRequeridas"], PDO::PARAM_INT);
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
		$stmt->bidParam(":horario_id",$crud2Model["horario_id"], PDO::PARAM_INT);
		$stmt->bidParam(":horario",$crud2Model["horario"], PDO::PARAM_STR);
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
		$stmt->bindParam(":promocion_id", $crud2Model, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
	}

	//✩ Funcion de editar Cupones ✩
	static public function editarCuponModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT cupon_id, password, expiración FROM $tabla WHERE cupon_id = :cupon_id");
		$stmt->bindParam(":cupon_id", $crud2Model, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
	}

	//✩ Funcion de editar Premios ✩
	static public function editarPremioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT premio_id, nombrePremio, descripcion, visitasRequeridas FROM $tabla WHERE premio_id = :premio_id");
		$stmt->bindParam(":premio_id", $crud2Model, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
	}


	//✩ Funcion de Actualizar Promocion ✩
	static public function actualizarPromocionModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombrePromocion = :nombrePromocion, descripcion = :descripcion WHERE promocion_id = :promocion_id");

		$stmt->bindParam(":nombrePromocion", $crud2Model["nombrePromocion"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $crud2Model["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":promocion_id", $crud2Model["promocion_id"], PDO::PARAM_INT);

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

		$stmt->bindParam(":password", $crud2Model["password"], PDO::PARAM_STR);
		$stmt->bindParam(":expiración", $crud2Model["expiración"], PDO::PARAM_STR);
		$stmt->bindParam(":cupon_id", $crud2Model["cupon_id"], PDO::PARAM_INT);

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
		$stmt->bindParam(":promocion_id", $crud2Model, PDO::PARAM_INT);

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
		$stmt->bindParam(":cupon_id", $crud2Model, PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}
		else{
		return "error";
		}
		$stmt->close();
	}
}