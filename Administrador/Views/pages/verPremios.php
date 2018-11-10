<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Vista de Premios </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Premios</h3>

                <div class="card-tools" >
                  <div  class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" action="POST" name="table_search" class="form-control float-right" placeholder="Buscar">
                    <div class="input-group-append">
                      <button  type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tr>
                    <th>Nombre del premio</th>
                    <th>Descripcion</th>
                    <th>Visitas</th>
                  </tr>
                  <tbody>
                  <?php
                  $vistaPremios = new Controlador2();
                  $vistaPremios -> vistaPremiosController();
                  $vistaPremios -> borrarPremiosController();
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div><!-- /.row -->