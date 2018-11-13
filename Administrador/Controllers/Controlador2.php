<?php 
//Tarea que equivale a 4 prácticas de la Unidad 3: practicas de la 10-14 hacer pagina en donde esten esas practicas, instalar quikstar. Equipo3 wordpress

//premios, promociones, horarios//

	//▼▼▼▼▼▼▼ PREPARACION DE DATOS ▼▼▼▼▼▼▼ //
	class Controlador2 {

    private $enlace = '';
    private $pagina = '';

		public static function plantilla(){
      include 'Views/plantilla.php';
		}

     // Se muestra la página dependiendo de la variable GET - action
    public function mostrarPagina(){

      if(isset($_GET['action'] )){
        $enlace = $_GET['action'];
      }else{
        $enlace = 'dashboard'; 
      }
      // Se llama al método del modelo que regresa la ruta del archivo a incluir
      $pagina = Modelo2::mostrarPagina($enlace);
    }


     # TODOS LOS DATOS SEGUN LA TABLA ----------------------------
        # ----------------------
    // Método que devuelve todos los datos de una tabla en específico (parametro: $tabla)
    public function getAll($tabla) {
        // Recibe la respuesta del modelo, se pasa como parámetro el nombre de la tabla
        $respuesta = crud2::getAll($tabla);

        return $respuesta;

        // Si trae por lo menos un registro retorna el registro (array asociativo)
        //if($respuesta) return $respuesta;
        //else return false; // Si no trae nada retorna false
    }

    //////////////////////////////////////////////P R O M O C I O N E S /////////////////////////////////////////////////////////////////////////

		//✩ Funcion para registrar Promociones ✩
		public function registroPromocionesController()
    {
      //se hace un llamado con POST para registrar todos los campos
      if(isset($_POST["idPromocionRegistro"]))
      {
        //especificacion de la toma de registro de cada campo
        $datosController = array("promocion_id"=>$_POST["idPromocionRegistro"],
        						 "nombre"=>$_POST["nombrePromocionRegistro"],
        						 "descripcion"=>$_POST["descripcionPromocionRegistro"]);

        $respuesta = crud2::registroPromocionesModel($datosController,"promociones");
        
       	//si los datos estan completos y correctos entra al success
        //if($respuesta =="success")
        //{
        	echo "<script> window.location = 'index.php?action=verPromociones&status=".$respuesta."';</script>";
        //}
      }
  	}

  	public function vistaPromocionesController(){//Funcion para poder ver la tabla de Promociones

      $respuesta = crud2::vistaPromocionesModel("promociones");

   			foreach($respuesta as $row => $item){
    			echo'<tr>
        		<td>'.$item["nombrePromocion"].'</td>
        		<td>'.$item["descripcion"].'</td>

         		<td><a href="index.php?action=verPromociones&idBorrar='.$item["promocion_id"].'"><button class="btn btn-danger">Borrar</button></a></td></tr>
            <td><a href="index.php?action=verPromociones&idEditar='.$item["promocion_id"].'"><button class="btn btn-info">Editar</button></a></td></tr>';
    		}
  		}

  		public function editarPromocionController(){//Funcion para editar Promocion

    		$datosController = $_GET["id"];
    		$respuesta = crud2::editarPromocionModel($datosController, "promociones");
			echo'
    		<div class="form-group"> 
      			<input type="hidden" class="form-control" value="'.$respuesta[0]["promocion_id"].'" name="idPromocionActualizar">
    		</div>
   			<div class="form-group">
       			<label for="nombrePromocionEditar">Nombre</label> 
       			<input type="text" class="form-control" value="'.$respuesta[0]["nombrePromocion"].'" name="nombrePromocionActualizar" required>
    		</div>
    		<div class="form-group">
       			<label for="descripcionPromocionEditar">Nombre</label> 
       			<input type="text" class="form-control" value="'.$respuesta[0]["descripcion"].'" name="descripcionPromocionActualizar" required>
    		</div>
  			<div class="card-footer">
      			<input type="submit" class="btn btn-primary" value="Actualizar">
    		</div>';
  		}

  		//Funcion para actualizar Promocion
  		public function actualizarPromocionController(){

    		if(isset($_POST["idPromocionActualizar"])){

      			$datosController = array("promocion_id"=>$_POST["idPromocionActualizar"],
            	"nombrePromocion"=>$_POST["nombrePromocionActualizar"],
            	"descripcion"=>$_POST["descripcionPromocionActualizar"]);

				    $respuesta = crud2::actualizarPromocionModel($datosController, "promociones");

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
    		if(isset($_GET["id"])){
    			$respuesta = crud2::borrarPromocionModel($_GET["id"], "promociones");

       			echo "<script> window.location = 'index.php?action=verPromociones&status=".$respuesta."';</script>";
    		}
  		}

  		//////////////////////////////////////////////  C U P O N E S  /////////////////////////////////////////////////////////////////////////

		  //✩ Funcion para registrar Cupones ✩
		  public function registroCuponesController()
    	{
        //se hace un llamado con POST para registrar todos los campos
      	if(isset($_POST["idCuponRegistro"]))
      	{
        	//especificacion de la toma de registro de cada campo
        	$datosController = array("password"=>$_POST["passwordCuponRegistro"],"expiracion"=>$_POST["expiracionCuponRegistro"]);

        	$respuesta = crud2::registroCuponesModel($datosController,"cupones");
        
       		//si los datos estan completos y correctos entra al success
        	if($respuesta =="success")
        	{
        		echo "<script> window.location = 'index.php?action=verCupones';</script>";
        	}
      	}
  		}

  		public function vistaCuponesController(){//Funcion para poder ver la tabla de Cupones
    		$respuesta = crud2::vistaCuponesModel("cupones");
   			foreach($respuesta as $row => $item){
    			echo'<tr>
        		<td>'.$item["password"].'</td>
        		<td>'.$item["expiracion"].'</td>

         		<td><a href="index.php?action=verCupones&idBorrar='.$item["cupon_id"].'"><button class="btn btn-danger">Borrar</button></a></td></tr>';
    		}
  		}



  		public function editarCuponController(){//Funcion para editar Cupon

    		$datosController = $_GET["cupon_id"];
    		$respuesta = crud2::editarCuponesModel($datosController, "cupones");
			   echo'
    		<div class="form-group"> 
      			<input type="hidden" class="form-control" value="'.$respuesta["cupon_id"].'" name="idCuponActualizar">
    		</div>
   			<div class="form-group">
       			<label for="passwordCuponEditar">Password</label> 
       			<input type="text" class="form-control" value="'.$respuesta["password"].'" name="passwordCuponActualizar" required>
    		</div>
    		<div class="form-group">
       			<label for="expiracionCuponEditar">Expiracion</label> 
       			<input type="text" class="form-control" value="'.$respuesta["expiracion"].'" name="expiracionCuponActualizar" required>
    		</div>
  			<div class="card-footer">
      			<input type="submit" class="btn btn-primary" value="Actualizar">
    		</div>';
  		}

  		//Funcion para actualizar Cupon
  		public function actualizarCuponController(){

    		if(isset($_POST["idCuponActualizar"])){

      		$datosController = array("cupon_id"=>$_POST["idCuponActualizar"],
            "password"=>$_POST["passwordCuponActualizar"],
            "expiracion"=>$_POST["expiracionCuponActualizar"]);

				    $respuesta = crud2::actualizarCuponModel($datosController, "cupones");

      			if($respuesta == "success"){
        			echo "<script> window.location = 'index.php?action=verCupones';</script>";
     			  }
      			else{
        			echo "error";
      			}
   			}  
  		}

  		//Funcion para borrar Cupon
  		public function borrarCuponController(){

    		if(isset($_GET["idBorrar"])){

    			$datosController = $_GET["idBorrar"];
    			 
          $respuesta = crud2::borrarCuponModel($datosController, "cupones");

       		if($respuesta == "success"){
        		echo "<script> window.location = 'index.php?action=verCupones';</script>";
       		}
    		}
  		}

      //////////////////////////////////////////////  P R E M I O S /////////////////////////////////////////////////////////////////////////

      //✩ Funcion para registrar PremiosPremios ✩
      public function registroPremiosController()
      {

        //se hace un llamado con POST para registrar todos los campos
        if(isset($_POST["idPremioRegistro"]))
        {
        	echo "<script>alert('".$_POST["idPremioRegistro"].",".$_POST["nombrePremioRegistro"].",".$_POST["descripcionPremioRegistro"].",".$_POST["visitasRequeridasPremioRegistro"]."');</script>";
        	
          //especificacion de la toma de registro de cada campo
          $datosController = array("premio_id"=>$_POST["idPremioRegistro"], 
          						   "nombrePremio"=>$_POST["nombrePremioRegistro"],
          						   "descripcion"=>$_POST["descripcionPremioRegistro"], 
          						   "visitasRequeridas"=>$_POST["visitasRequeridasPremioRegistro"]);


          $respuesta = crud2::registroPremiosModel($datosController,"premios");


        
          //si los datos estan completos y correctos entra al success
          //if($respuesta =="success")
          //{
            echo "<script> window.location = 'index.php?action=verPremios&status=".$respuesta."';</script>";
          //}
        }
      }

      public function vistaPremiosController(){//Funcion para poder ver la tabla de Premios
        $respuesta = crud2::vistaPremiosModel("premios");
        foreach($respuesta as $row => $item){
          echo'<tr>
            <td>'.$item["nombre"].'</td>
            <td>'.$item["descripcion"].'</td>
            <td>'.$item["visitasRequeridas"].'</td>

            <td><a href="index.php?action=verPremios&idBorrar='.$item["premio_id"].'"><button class="btn btn-danger">Borrar</button></a></td></tr>
            <td><a href="index.php?action=verPremios&idBorrar='.$item["premio_id"].'"><button class="btn btn-info">Editar</button></a></td></tr>';
        }
      }
 
      public function editarPremiosController(){//Funcion para editar Premio

        $datosController = $_GET["id"];
        $respuesta = crud2::editarPremioModel($datosController, "premios");
         echo'
        <div class="form-group"> 
            <input type="hidden" class="form-control" value="'.$respuesta[0]["premio_id"].'" name="idPremioActualizar">
        </div>
        <div class="form-group">
            <label for="nombrePremioEditar">Nombre</label> 
            <input type="text" class="form-control" value="'.$respuesta[0]["nombrePremio"].'" name="nombrePremioActualizar" required>
        </div>
        <div class="form-group">
            <label for="descripcionPremioEditar">Descripcion</label> 
            <input type="text" class="form-control" value="'.$respuesta[0]["descripcion"].'" name="descripcionPremioActualizar" required>
     </div>
        <div class="form-group">
            <label for="visitasRequeridasPremioEditar">visitasRequeridas</label> 
            <input type="text" class="form-control" value="'.$respuesta[0]["visitasRequeridas"].'" name="visitasRequeridasPremioActualizar" required>
        </div>
        <div class="card-footer">
            <input type="submit" class="btn btn-primary" value="Actualizar">
        </div>';
      }

      //Funcion para actualizar Premio
      public function actualizarPremioController(){

        if(isset($_POST["idPremioActualizar"])){

          $datosController = array("premio_id"=>$_POST["idPremioActualizar"],
            "nombrePremio"=>$_POST["nombrePremioActualizar"],
            "descripcion"=>$_POST["descripcionPremioActualizar"],
            "visitasRequeridas"=>$_POST["visitasRequeridasPremioActualizar"]);

            $respuesta = crud2::actualizarPremioModel($datosController, "premios");

            if($respuesta == "success"){
              echo "<script> window.location = 'index.php?action=verPremios';</script>";
            }
            else{
              echo "error";
            }
        }  
      }

      //Funcion para borrar premio
      public function borrarPremiosController(){

        if(isset($_GET["id"])){
           
          $respuesta = crud2::borrarPremioModel($_GET["id"], "premios");

          echo "<script> window.location = 'index.php?action=verPremios&status=".$respuesta."';</script>";
        }
      }
      
      //////////////////////////////////////////////  H O R A R I O S /////////////////////////////////////////////////////////////////////////

      //✩ Funcion para registrar Horarios ✩
      public function registroHorariosController()
      {

        //se hace un llamado con POST para registrar todos los campos
        if(isset($_POST["idHorarioRegistro"]))
        {
          echo "<script>alert('".$_POST["idHorarioRegistro"].",".$_POST["horarioHorarioRegistro"]."');</script>";
          
          //especificacion de la toma de registro de cada campo
          $datosController = array("horario_id"=>$_POST["idHorarioRegistro"], 
                         "horario"=>$_POST["horarioHorarioRegistro"]);

          $respuesta = crud2::registroHorariosModel($datosController,"horarios");
        
          if($respuesta == "success"){
                echo '<script> 
                            alert("Datos guardados correctamente");
                            window.location.href = "index.php?action=verHorarios"; 
                      </script>';                
            }else{
                //En caso de haber un error se queda en la misma pagina y le notifica al usuario
                echo '<script> alert("Error al guardar") </script>';
            }
        }
      }

      public function vistaHorariosController(){//Funcion para poder ver la tabla de Premios
        $respuesta = crud2::vistaHorariosModel("horarios");
        foreach($respuesta as $row => $item){
          echo'<tr>
            <td>'.$item["horarios"].'</td>

            <td><a href="index.php?action=verHorarios&idBorrar='.$item["horario_id"].'"><button class="btn btn-danger">Borrar</button></a></td></tr>
            <td><a href="index.php?action=verHorarios&idBorrar='.$item["horario_id"].'"><button class="btn btn-info">Editar</button></a></td></tr>';
        }
      }

      public function editarHorariosController(){//Funcion para editar Premio

        $datosController = $_GET["id"];
        $respuesta = crud2::editarHorarioModel($datosController, "horarios");
         echo'
        <div class="form-group"> 
            <input type="hidden" class="form-control" value="'.$respuesta[0]["horario_id"].'" name="idHorarioActualizar">
        </div>
        <div class="form-group">
            <label for="horarioHorarioEditar">Nombre</label> 
            <input type="text" class="form-control" value="'.$respuesta[0]["horario"].'" name="horarioHorarioActualizar" required>
        </div>
        <div class="card-footer">
            <input type="submit" class="btn btn-primary" value="Actualizar">
        </div>';
      }

      //Funcion para actualizar Premio
      public function actualizarHorariosController(){

        if(isset($_POST["idHorarioActualizar"])){

          $datosController = array("horario_id"=>$_POST["idHorarioActualizar"],
            "horario"=>$_POST["horarioHorarioActualizar"]);

            $respuesta = crud2::actualizarHorarioModel($datosController, "horarios");

            if($respuesta == "success"){
              echo "<script> window.location = 'index.php?action=verHorarios';</script>";
            }
            else{
              echo "error";
            }
        }  
      }

      //Funcion para borrar premio
      public function borrarHorariosController(){

        if(isset($_GET["id"])){
           
          $respuesta = crud2::borrarHorarioModel($_GET["id"], "horarios");

          echo "<script> window.location = 'index.php?action=verHorarios&status=".$respuesta."';</script>";
        }
      }
  }
?>