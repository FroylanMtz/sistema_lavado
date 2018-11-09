<?php

//Pagina en donde se realiza la actualizacion de la contraseña de la cuenta

//Se almacena la contraseña actual de la cuenta en una variable
$contrasenaActual =  $_SESSION['contrasena'];

//Despues se crea un objeto de la clase controlador
$controlador = new Controlador();

//Como el formulario redirecciona a la misma pagina, y esta a la vez manda llamar la funcion que valida y manda llamar al modelo que interactua con la base de datos, es necesario valir que se estan enviando los datos a traves del formulario, porque cuando se carga por primera vez marcaria errro porque no encuentra los parametros del formulario
if(isset($_POST['contrasenaActual']) && isset($_POST['contrasenaNueva'])){

    $controlador -> actualizarContrasena();
}

?>

<div class="col s12 mt-5 " id="pan" >
    <a data-target="mobile-demo" class="breadcrumb sidenav-trigger"> Menú </a>
    <a href="index.php?pagina=actualizar_contrasena" class="breadcrumb"> Actualizar contraseña </a>
</div>

<!--Titulo de la pagina-->
<div class="row">
    <h4> Actualizar contraseña </h4>
</div>



<div class="row">
    <form class="col s12" method="post">
        <!--Formulario para introducir la contrasea actual y una nueva a la que se quiere cambiar la actual :D -->
        <div class="card blue-grey lighten-5 hoverable">
            <div class="card-content white-text">

                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">https</i>
                        <input placeholder="Contraseña actual aqui" name="contrasenaActual" type="password" class="validate">
                        <label for="first_name">Contraseña Actual</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">enhanced_encryption</i>
                        <input placeholder="Nueva contraseña aqui" name="contrasenaNueva" type="password" class="validate">
                        <label for="first_name">Contraseña Nueva</label>
                    </div>
                </div>

                <div class="row">
                    <center> 
                        <button type="submit" class="waves-effect waves-light btn-large blue darken-4" ><i class="material-icons left">autorenew</i> Guardar</button> 
                    <center>
                </div>

            </div>
        </div>
    </form>
</div>