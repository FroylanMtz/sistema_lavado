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

        		$respuesta = crud2::registroPromocionesModel($datosController,"promociones");
        
       			 //si los datos estan completos y correctos entra al success
        		if($respuesta =="success")
        		{
        		echo "<script> window.location = 'index.php?action=verPromociones';</script>";
        		}
      		}
  		}	
	}


 ?>