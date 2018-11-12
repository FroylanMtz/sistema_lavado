<?php 
    
    // Traer todos los datos de un cupón, se crea un objeto del tipo controlador 1
    $controlador = new Controlador1();
    
    // Se verifica el id con GET
    if(isset($_GET["id"])){
        // Se manda llamar al método para obtener todos los datos del cupón como un 
        // array asociativo
        $datosCupon = $controlador->obtenerCuponById();
        var_dump($datosCupon);
    }

 ?>

<div class="row">
        <div class="page-header">
          <div class="d-flex align-items-center">
              <h2 class="page-header-title">ID del cupón: <strong><?php echo $_GET["id"]; ?></strong></h2>              
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
                <th>Detalles</th>
            </tr>
        </thead>
        <tbody>
        
            
        </tbody>
    </table>

  

            