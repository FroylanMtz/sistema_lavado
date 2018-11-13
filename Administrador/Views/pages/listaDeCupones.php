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

<div class="row">
        <div class="page-header">
          <div class="d-flex align-items-center">
              <h2 class="page-header-title">Cupones y visitas</h2>
          </div>
        </div>

    </div><br>



     <div class="col-xl-6">
            <!-- Block Buttons -->            
            <div class="row">                           
                <div class="col-xl-6">
                    <form method="POST">
                    <button name="generar" type="submit" class="btn btn-shadow btn-block mb-2">+ Generar cupón</button>
                    </form>
                </div>
            </div>
            <!-- End Block Buttons -->
        </div>
    <br>

    <table id="sorting-table" class="table mb-0">
        <thead>
            <tr>
                <th>ID del cupón</th>
                <th>Fecha de expiración</th>                                
                <th>Número de visitas</th>
                <th>Agregar visita</th>                              
                <th>Ver y/o canjear premio</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            // Se muestran todos los registros de los admin con un foreach
        if($cupones){
            foreach($cupones as $cupon): // Inicio foreach        
        ?>        
            <tr>
                <!-- Nombre de usuario con un estlo diferente a los demás campos-->
                <td><span style="width:100px;"><span class="badge-text badge-text-small info"><?php echo $cupon["cupon_id"]; ?></span></span></td>
                
                <td><?php echo $cupon["expiracion"]; ?></td>
                

                <!-- # de visitas -->
                    <td>
                    <?php // Llamada al método para ver el numero de visitas de un cupón
                        $numVisitas = $controlador->numeroVisitas($cupon["cupon_id"]);
                        echo $numVisitas;

                        // Se manda llamar la función del controlador para verificar si el número de visitas corresponde a un premio, si es así se inserta el id del premio y del cupón en la tabla premio_cupones.
                        // Se pasan como parámetros el id del cupón y las visitas del mismo
                        // $controlador->verificarPremio($cupon["cupon_id"],$numVisitas);
                     ?>
                    </td>
                <!-- Agregar visitas -->
                    <td class="td-actions">
                        <a href="index.php?action=agregarVisita&id=<?php echo($cupon["cupon_id"]); ?>"><i class="la la-plus edit"></i></a>
                    </td>

                <td class="td-actions">
                        <a href="index.php?action=cupon&id=<?php echo($cupon["cupon_id"]); ?>"><i class="la la-search edit"></i></a>                    
                </td>
            </tr>
              
        <?php  endforeach; // FIN foreach
        }else{
            echo "<td>No hay cupones</td>";
        }
        ?>

        </tbody>
    </table>
