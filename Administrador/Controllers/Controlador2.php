<?php 

	//▼▼▼▼▼▼▼ PREPARACION DE DATOS ▼▼▼▼▼▼▼
	class Controlador2 {

		public static function template(){
			include "Views/Plantilla.php";
		}

		//✩ Funcion para registrar Promociones ✩
		public function registroPromocionesController()
    	{
      		//se hace un llamado con POST para registrar todos los campos
      		if(isset($_POST["idPromocionRegistro"]))
      		{
        		//especificacion de la toma de registro de cada campo
        		$datosController = array("nombre"=>$_POST["nombrePromocionRegistro"],"descripcion"=>$_POST["descripcionPromocionRegistro"]);

        		$respuesta = Datos::registroPromocionesModel($datosController,"promociones");
        
       			 //si los datos estan completos y correctos entra al success
        		if($respuesta =="success")
        		{
         		 //con este echo el ususario una vez que registra al jugador, este echo te regresa la interfaz de listado de jugadores, que contiene la informacion de los jugadores que se han agregado
        		echo "<script> window.location = 'index.php?action=verPromociones';</script>";
        		}
      		}
  		}	
	}


 ?>