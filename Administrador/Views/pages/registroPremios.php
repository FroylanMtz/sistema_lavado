
<?php 
    
    // Si se oprimió el botón de guardar datos
    if(isset($_POST["premios"])){
        // Se crea un objeto del tipo Controlador1
        $controlador = new crud2();
        // Se llama al método para agregar usuario
        $controlador->getPremios();        
    }


 ?>



  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">REGISTRO DE PREMIOS</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid //-->
    </div>

<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Premio</h3>
              </div>
              <form role="form" method="POST">
                <div class="card-body">
                <div class="form-group">
                    <input type="hidden" class="form-control" id="idPremiooRegistro" name="idPremioRegistro"  value="1">
                  </div>
                  <div class="form-group">
                    <label for="nombrePremioRegistro">Nombre</label>
                    <input type="text" class="form-control" id="nombrePremioRegistro" name="nombrePremioRegistro" placeholder="nombre">
                  </div>
                  <div class="form-group">
                    <label for="descripcionPremioRegistro">Descripcion</label>
                    <input type="text" class="form-control" id="descripcionPremioRegistro" name="descripcionPremioRegistro" placeholder="Descripcion">
                  </div>
                   <div class="form-group">
                    <label for="visitasRequeridasPremioRegistro">Visitas Requeridas</label>
                    <input type="text" class="form-control" id="visitasRequeridasPremioRegistro" name="visitasRequeridasPremioRegistro" placeholder="Visitas">
                  </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
<?php 
  //se invoca la funcion  registroPromocionController de la clase crud2
  $registro ->registroPremiosController();
    if(isset($_GET["action"])){
      if($_GET["action"]=="ok"){
        echo "Registro Exitoso";
      }
    }
?>