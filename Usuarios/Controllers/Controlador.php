<?php

//Clase controladora de la aplicacion
class Controlador {

    //Definicion de las variables que contendran el enlace que viene desde la vista y la pagina la cual se debe incluir en la aplicacion, para cambiar de vista
    private $enlace = '';
    private $pagina = '';

    //Funcion que se encarga de valir si existe la sesion y redireccionar ya sea a la pagina de inicio dentro del sistema o a la pagina del login para el ingreso de credenciales del usuario
    public function cargarPlantilla(){

        session_start();

        //Se compara para saber si se redirecciona a la pagina principal o al login
        
        
        
        if( isset($_SESSION['iniciada']) ){
            include 'Views/Plantilla.php';
        }else{
            include 'login.php';
        }

    }



    //Funcion ruteadora la cual "cacha el parametro GET de la url y la redirecciona a la pagina mencionada con esta variable GET"
    public function mostrarPagina(){

        //si la variable no existe o viene vacia se manda por defecto a la pagina principal dentro de la aplicacion
        
        $contrasenaCupon = $_SESSION['contrasena'];
        $idCupon = $_SESSION['idCupon'];
        
        $expiracion = $_SESSION['expiracion'];

        if( strtotime( $expiracion ) < strtotime( date('Y-m-d') )  ){

            echo '<script>
                
                alert("Su cupon ya está expriado, le recomendamos coprar otro con el vendedor del establecimiento para seguir disfrutando de los premios que tenemos para ti :)");

                window.location.href = "login.php";



                </script>';
            
        }else{

            if ($contrasenaCupon == $idCupon){
                $enlace = 'actualizar_contrasena';
            }else{
                if(isset($_GET['pagina'] )){
                    $enlace = $_GET['pagina'];
                }else{
                    $enlace = 'inicio'; 
                }
            }

            //Este valor se le manda al modelo para que valide si existe la pagina, una vez validado esta funcion del modelo regresa la pagina y el controlador la carga
            $pagina = Modelo::mostrarPagina($enlace);

            include $pagina;

        } 

        
        
        

    }

    //Funcion que se encarga de validar los datos ingresador en la pagina del login, recoge los datos del formulario y los manda al modelo para que se haga una consulta con estos, si esa consulta regresa algo es que si esta registrado y se redirecciona a la otra pagina, sino, es que no esta registrado y se queda en la misma pagina informandole con un mensaje pertinente
    public function iniciarSesion()
    {

        //Se valida que las variables no vengan vacias o nulas
        if( isset($_POST['id']) && isset( $_POST['contrasena'] ))
        {

            //Los datos del formulario del login se almacenan en este arreglo asociativo
            $datos = array( 'id'      => $_POST['id'],
                            'contrasena'  => $_POST['contrasena']);
            
            //dicho arreglo se pasa a la funcion del modelo para que haga las validaciones
            $respuesta = Datos::validarUsuario($datos, 'cupones');

            //Si se regresa algo, quiere decir que los datos si existen en la base de datos y por ende se inicia la sesion y se redirecciona a la pagina de inciio
            if( $respuesta )
            {
                //Se inicia la sesion y se crean algunas variables para almacenar informacion del cupon que la inicio
                session_start();
                $_SESSION['iniciada'] = true;
                $_SESSION['idCupon'] = $respuesta['cupon_id'];
                $_SESSION['contrasena'] = $respuesta['password'];
                $_SESSION['expiracion'] = $respuesta['expiracion'];

                //redirecciona dentro del sistema
                echo '<script> window.location.href = "index.php?action=inicio"; </script>';

                
            }else
            {
                //En caso de que no se haya regresado nada en la respuesta del modelo, se queda en la misma pagina y se le muestra un mensaje de error
                echo '<script>
                swal({
                    type: "error",
                    title: "Error al ingresar",
                    text: "Verifique sus credenciales, e intente de nuevo"
                  })

                </script>';
                echo '<script> window.location.href = login.php"; </script>';
            }

        }
        
    }


    /* ESTAS FUNCIONES YA SON PARA INFORMACION DENTRO DEL SISTEMA */

    //funcion para obtener los datos de los horarios de servicio del establecimiento, se leen de una tabla debido a que el admin es el que los establece
    public function obtenerHorario(){

        //Se crea un arreglo que recibira los datos del modelo
        $datosHorarios = array();

        //Se hace la peticion a la base de datos a traves de esta funcion del modelo
        $datosHorarios = Datos::obtenerHorario();

        //Se regresa la informacion obtenida a la vista
        return $datosHorarios;

    }

    //Funcion para traer los datos en la tabla premios
    public function obtenerPremios(){

        //Se declara un arreglo en done se van a recibir los datos por parte del modelo
        $datosPremios = array();

        //Se obtienen a traves de la funcion obtenerPremios del modelo
        $datosPremios = Datos::obtenerPremios();

        //Se retornan a la vista que es la pagina de "premios disponibles"
        return $datosPremios;

    }

    //Funcion para obtener los premios disponibles para el canje o para los premios que ya han sido canjeados con anterioridad, estos premios estan en otra tabla, y se insertan a dicha tabla cuando las visitas alcanzan para poder canjearlos
    public function obtenerMisPremios(){

        //Se declara un arreglo para recibir todos los datos de la tabla
        $datosMisPremios = array();

        //Se llena el arreglo con los datos obtenidos por la funcion del modelo obtenerMisPremios()
        $datosMisPremios = Datos::obtenerMisPremios();

        //Se retornan a la vista que es la pagina de "mis premios"
        return $datosMisPremios;

    }

    //Funcion que sirve para obtener todas los registros de la tabla visitas, las cuales son las visitas que ha realizado el cliente al establecimiento, estas visitas el administrador se encarga de administrarlas, cuando el cliente realiza una compra de algun producto o servicio es cuando automaticamente se registra la visita en la tabla
    public function obtenerVisitas(){

        //se declara un arreglo para recibir los datos
        $datosVisitas = array();

        //se pobla dicho arreglo con los datos obtenidos por la funcion obtenerVisitas() del modelo
        $datosVisitas = Datos::obtenerVisitas();

        //Se retornan los datos a la vista que es la pagina de "visitas"
        return $datosVisitas;

    }

    //Funcion para actualizar la contraseña del cupon que esta con la sesion iniciada actualmente, es por ello que se almaceno la variable del id cuando se inicia la sesion en php
    public function actualizarContrasena(){

        //Se obtiene los datos de la contraseña actual y uno nueva  desde un formulario en la pagina "cambiar_contraseña"
        $contrasenaActual = $_POST['contrasenaActual'];
        $contrasenaNueva = $_POST['contrasenaNueva'];

        //Se trae la variable de la sesion en donde se almacena el id del usuario logeado actualmente
        $idCupon = $_SESSION['idCupon'];

        //Se compara si la contraseña escrita en el formulario como la contraseña actual coincide con la verdader a contraseña actual que esta almacenadad en uan variable de sesion
        if($contrasenaActual == $_SESSION['contrasena']){
            
            //Se manda la peticion de cambio de contraseña al modelo pasanole el id del cupon iniciado, junto con la nueva contraseña
            $respuesta = Datos::actualizarContrasena($idCupon, $contrasenaNueva);

            //se devuelve la respuesta y se valida si fue correcta o no
            if($respuesta == "success"){
                
                //En caso de que fue correta la edicion se le avisa al cliente con un mensaje de exito (color verde)
                echo '<script> 
                        swal({
                            position: "top-end",
                            type: "success",
                            title: "Datos editados correctamente",
                            showConfirmButton: false,
                            timer: 1500
                        });

                        window.location.href = "login.php";
                      </script>';
                
            }else{

                //Pero si no fue correcta la edicion se le avisa con un mensaje de error color rojo
                echo '<script> swal({
                    position: "top-end",
                    type: "error",
                    title: "No se pudieron editar los datos",
                    showConfirmButton: false,
                    timer: 1500
                }) </script>';
            }

        }else{
            //Este mensaje de error en caso de que no hayan coincidido las contraseñas actuales con la que escribio el usuario afirmando que era la actual
            echo '<script> 
                
            swal({
                type: "error",
                title: "Error al editar",
                text: "La contraseña actual no corresponde con la ingresada"
              })

            </script>';
        }

        //$respuesta = Datos::

    }


    //Funcion que obtiene las promociones actuales del establecimiento para uqel a gente compre mas
    public function obtenerPromociones(){
        
        //Se declara un arreglo para recibir los datos que vienen desde el modelo
        $datosPromociones = array();

        //Se pobla el arreglo con los datos
        $datosPromociones = Datos::obtenerPromociones();

        //Se retornan a la vista que en este caso es la pagina de "promociones"
        return $datosPromociones;

    }



}