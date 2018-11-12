<div class="widget has-shadow">
  <div class="widget-header bordered no-actions d-flex align-items-center">
    <h4>Registrar Promocion</h4>
  </div>
</div>
   
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Registro</h3>
              </div>
              <form role="form" method="POST">
                <div class="card-body">
                <div class="form-group">
                  <label for="idPromocionRegistro">Id</label>
                    <input type="number" class="form-control" id="idPromocionRegistro" name="idPromocionRegistro"  value="1">
                  </div>
                  <div class="form-group">
                    <label for="nombrePromocionRegistro">Nombre</label>
                    <input type="text" class="form-control" id="nombrePromocionRegistro" name="nombrePromocionRegistro" placeholder="nombre">
                  </div>
                  <div class="form-group">
                    <label for="descripcionPromocionRegistro">Descripcion</label>
                    <input type="text" class="form-control" id="descripcionPromocionRegistro" name="descripcionPromocionRegistro" placeholder="descripcion">
                  </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
<?php 
  // Si se oprimió el botón de guardar datos
  if($_POST){
    // Se crea un objeto del tipo Controlador2
    $controlador = new Controlador2();
    // Se llama al método para agregar usuario
    $controlador->registroPromocionesController();        
  }
?>