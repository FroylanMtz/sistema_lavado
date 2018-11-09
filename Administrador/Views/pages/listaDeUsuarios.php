<?php 
    
    // Traer todos los datos de la tabla usuarios
    ;

 ?>

<div class="row">
        <div class="page-header">
          <div class="d-flex align-items-center">
              <h2 class="page-header-title">Lista de usuarios</h2>              
          </div>
        </div>
    </div><br>



    <table id="sorting-table" class="table mb-0">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Nombre(s)</th>
                <th>Apellido(s)</th>
                <th>Teléfono</th>
                <th><span style="width:100px;">Correo</span></th>
                <th>Foto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><span style="width:100px;"><span class="badge-text badge-text-small info">USER</span></span></td>
                <td><span class="text-primary">054-01-FR</span></td>
                <td>Lori Baker</td>
                <td>US</td>
                <td>10/21/2017</td>
                <td>$139.45</td>
                <td class="td-actions">
                    <a href="#"><i class="la la-search edit"></i></a>
                    <a href="#"><i class="la la-edit edit"></i></a>
                    <a href="#"><i class="la la-trash delete"></i></a>
                </td>
            </tr>        
        </tbody>
    </table>