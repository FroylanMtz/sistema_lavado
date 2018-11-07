<?php 

	//▼▼▼▼▼▼▼ PREPARACION DE DATOS ▼▼▼▼▼▼▼
	class Controlador2 {

		public static function plantilla(){
			include "Views/Plantilla.php";
		}

		//✩ Funcion para registrar Promociones ✩
		public function registroPromocionesController()
    	{
      		//se hace un llamado con POST para registrar todos los campos
      		if(isset($_POST["idPromocionRegistro"]))
      		{
        		//especificacion de la toma de registro de cada campo
        		$crud2Controller = array("nombre"=>$_POST["nombrePromocionRegistro"],"descripcion"=>$_POST["descripcionPromocionRegistro"]);

        		$respuesta = crud2::registroPromocionesModel($crud2Controller,"promociones");
        
       			 //si los datos estan completos y correctos entra al success
        		if($respuesta =="success")
        		{
        		echo "<script> window.location = 'index.php?action=verPromociones';</script>";
        		}
      		}
  		}

  		public function vistaPromocionesController(){//Funcion para poder ver la tabla de Promociones
    		$respuesta = crud2::vistaPromocionesModel("promociones");
   			foreach($respuesta as $row => $item){
    			echo'<tr>
        		<td>'.$item["nombre"].'</td>
        		<td>'.$item["descripcion"].'</td>

         		<td><a href="index.php?action=verPromociones&idBorrar='.$item["promocion_id"].'"><button class="btn btn-danger">Borrar</button></a></td>
      			</tr>';
    		}
  		}

  		public function editarPromocionController(){//Funcion para editar Promocion

    		$crud2Controller = $_GET["promocion_id"];
    		$respuesta = crud2::editarPromocionesModel($crud2Controller, "promociones");
			echo'
    		<div class="form-group"> 
      			<input type="hidden" class="form-control" value="'.$respuesta["promocion_id"].'" name="idPromocionActualizar">
    		</div>
   			<div class="form-group">
       			<label for="nombrePromocionEditar">Nombre</label> 
       			<input type="text" class="form-control" value="'.$respuesta["nombre"].'" name="nombrePromocionActualizar" required>
    		</div>
    		<div class="form-group">
       			<label for="descripcionPromocionEditar">Nombre</label> 
       			<input type="text" class="form-control" value="'.$respuesta["descripcion"].'" name="descripcionPromocionActualizar" required>
    		</div>
  			<div class="card-footer">
      			<input type="submit" class="btn btn-primary" value="Actualizar">
    		</div>';
  		}

  		//Funcion para actualizar Promocion
  		public function actualizarPromocionController(){

    		if(isset($_POST["idPromocionActualizar"])){

      			$datosController = array("promocion_id"=>$_POST["idPromocionActualizar"],
            	"nombre"=>$_POST["nombrePromocionActualizar"],
            	"descripcion"=>$_POST["descripcionPromocionActualizar"]);

				$respuesta = crud2::actualizarPromocionModel($crud2Controller, "promociones");

      			if($respuesta == "success"){
        			echo "<script> window.location = 'index.php?action=verPromociones';</script>";
     			}
      			else{
        			echo "error";
      			}
   			}  
  		}

  		//Funcion para borrar Promocion
  		public function borrarPromocionesController(){
    		if(isset($_GET["idBorrar"])){
    			$crud2Controller = $_GET["idBorrar"];
    			$respuesta = crud2::borrarEquipoModel($datosController, "promociones");

       			if($respuesta == "success"){
        			echo "<script> window.location = 'index.php?action=verPromociones';</script>";
       			}
    		}
  		}		
	}
?>