<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Vista de Cupones </h1>
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
                <h3 class="card-title">Cupones</h3>

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
                    <th>Password</th>
                    <th>Expiracion</th>
                  </tr>
                  <tbody>
                  <?php
                  $vistaCupones = new Controlador2();
                  $vistaCupones -> vistaCuponesControlador2();
                  $vistaCupones -> borrarCuponesController();
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div><!-- /.row -->