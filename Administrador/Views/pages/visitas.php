<?php 
	// Visitas de los cupones, también agregar visitas
    


 ?>

 <?php 
    
    // Traer todos los datos de la tabla administradores
    // Se crea un objeto del tipo Controlador1
    $controlador = new Controlador1();

    // Llamada al método que trae los datos de los usuarios (admin)
    // Se pasa el nombre de la tabla como parámetro
    $cupones = $controlador->getAll("cupones");    


    // Si se oprimió el botón de agregar usuario
    if(isset($_POST["generar"])){                
        // Se llama a la función del controlador para generar un cupón
        $controlador->generarCupon();                    
    }

 ?>
<br>
<div class="row">
        <div class="page-header">
          <div class="d-flex align-items-center">
              <h2 class="page-header-title">Visitas</h2>              
          </div>
        </div>

    </div>


    <!--
     <div class="col-xl-6">
            
            <div class="row">                           
                <div class="col-xl-6">
                    <form method="POST">
                    <button name="generar" type="submit" class="btn btn-shadow btn-block mb-2">+ Generar cupón</button>
                    </form>
                </div>
            </div>
       
        </div>
    -->
    <br>

    <table id="sorting-table" class="table mb-0">
        <thead>
            <tr>
                <th>ID del cupón</th>
                <th>Numero de visitas</th>                
                <th>Agregar visita</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            // Se muestran todos los registros de los admin con un foreach
            // se muestra un mensaje si no hay cupones
            if($cupones){
                foreach($cupones as $cupon): // Inicio foreach
        ?>        
                <tr>
                	<!-- ID de cupón -->
                    <td><span style="width:100px;"><span class="badge-text badge-text-small info"><?php echo $cupon["cupon_id"]; ?></span></span></td>

                    <!-- # de visitas -->
                    <td>
                	<?php // Llamada al método para ver el numero de visitas de un cupón
                		$numVisitas = $controlador->numeroVisitas($cupon["cupon_id"]);
                		echo $numVisitas;

                		// Se manda llamar la función del controlador para verificar si el número de visitas corresponde a un premio, si es así se inserta el id del premio y del cupón en la tabla premio_cupones.
                		// Se pasan como parámetros el id del cupón y las visitas del mismo
                		$controlador->verificarPremio($cupon["cupon_id"],$numVisitas);
                	 ?>
                    </td>
                    
                    <!-- Agregar visitas -->
                    <td class="td-actions">
                        <a href="index.php?action=agregarVisita&id=<?php echo($cupon["cupon_id"]); ?>"><i class="la la-plus edit"></i></a>
                    </td>
                </tr>
              
        <?php  endforeach; // FIN foreach?>
      <?php }  // FIN IF
            else{
                echo "<tr><td>No hay cupones</td></tr>";
            }
                ?>
            
        </tbody>
    </table>

  

            