<?php 
    
    // Si se oprimió el botón de guardar datos
    if(isset($_POST["premios"])){
        // Se crea un objeto del tipo Controlador2
        $controlador = new Controlador2();
        // Se llama al método para agregar usuario
        $controlador->registroPremios();        
    }
?>


<div class="widget has-shadow">
  <div class="widget-header bordered no-actions d-flex align-items-center">
    <h4>Registrar Premio</h4>
  </div>
</div>

<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Premio</h3>
              </div>
              <form role="form" method="POST">
                <div class="card-body">
                <div class="form-group">
                    <input type="hidden" class="form-control" id="idPremioRegistro" name="idPremioRegistro"  value="1">
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
