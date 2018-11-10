<?php


class Controlador1 {

    // Variables miembro de la clase
    private $enlace = '';
    private $pagina = '';

    public function cargarPlantilla() {        
        
        //session_start();
        // Si la variable de sesión está iniciada se incluye la plantilla, de lo contrario
        // se direcciona al login, se inicia la session con session_start() en index.php
        if( isset($_SESSION['iniciada']) ){
            include 'Views/plantilla.php';
        }else{
            include 'Views/login.php';
        }
    }

    // Se muestra la página dependiendo de la variable GET - action
    public function mostrarPagina(){

        if(isset($_GET['action'] )){
            $enlace = $_GET['action'];
        }else{
            $enlace = 'dashboard'; 
        }

        // Se llama al método del modelo que regresa la ruta del archivo a incluir
        //$pagina = Modelo1::mostrarPagina($enlace);
        $pagina = Modelo1::mostrarPagina($enlace);

        include $pagina;
    }


    # INICIAR SESIÓN --------------------------------
        # ---------------------
    // Método que toma los datos del form de login y recibe la validación del modelo
    public function iniciarSesion() {
        // Se recibe la respuesta del modelo, se pasan el nombre de usuario
        // y contraseña del admin traido del form
        $respuesta = crud1::iniciarSesion($_POST["usuario"], $_POST["password"]);
        
        // Si los datos ingresados son correctos se inicia la sesion (session_start())
        if($respuesta) {
            //session_start();

            $_SESSION["iniciada"] = true; // para comparar si está iniciada la sesión
            // Se guarda el nombre de usuario, contraseña, nombre y apellidos
            // del admin en las variables de sesión $_SESSION
            $_SESSION["usuario"] = $respuesta[0]["nombreUsuario"];             
            $_SESSION["password"] = $respuesta[0]["password"];
            $_SESSION["nombre"] = $respuesta[0]["nombreAdmin"];
            $_SESSION["apellidos"] = $respuesta[0]["apellidos"];
            $_SESSION["correo"] = $respuesta[0]["correo"];
            $_SESSION["foto"] = $respuesta[0]["foto"];
            $_SESSION["telefono"] = $respuesta[0]["telefono"];
            $_SESSION["admin_id"] = $respuesta[0]["admin_id"];
            

            // Se direcciona a la plantilla o navegación principal
            echo '<script> window.location.href = "index.php?action=dashboard"; </script>';
        }else {
            // Si se ingresaron datos del usuario incorrectos se dirije al login
            echo '<script> alert("Usuario o contraseña incorrectos") </script>';
            echo '<script> window.location.href = "index.php?action=login"; </script>';
        }
    }

    # TODOS LOS DATOS SEGUN LA TABLA ----------------------------
        # ----------------------
    // Método que devuelve todos los datos de una tabla en específico (parametro: $tabla)
    public function getAll($tabla) {
        // Recibe la respuesta del modelo, se pasa como parámetro el nombre de la tabla
        $respuesta = crud1::getAll($tabla);

        // Si trae por lo menos un registro retorna el registro (array asociativo)
        if($respuesta) return $respuesta;
        else return false; // Si no trae nada retorna false
    }


    # USUARIOS ------------------------------------
        # ---------------------
    // Método para preparar los datos y enviarlos al modelo, después recibe la respuesta
    // del modelo y la envía a la vista
    public function agregarUsuario() {
        $usuario = $_POST["usuario"];
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $correo = $_POST["correo"];
        $password = $_POST["password"];
        $telefono = $_POST["telefono"];        

        //Para saber el nombre de la foto se manda llamar esta funcion
        $nombreArchivo = basename($_FILES['foto']['name']);

        //Se concatena al nombre la carpeta en donde se guardaran todas las fotos cargadas por los usuarios
        $directorio = 'fotosAdmin/' . $nombreArchivo;

        //Para hacer algunas validaciones y el usuario por ejemplo no pase como foto una archivo pdf se extrae la extension de la foto
        $extension = pathinfo($directorio , PATHINFO_EXTENSION);

        //Todos los datos obtenidos del formulario son guardados en un objeto para luego ser pasados al modelo en donde seran almacenados en su respectiva tabla
        $datosUsuario = array('usuario' => $usuario,
                            'nombre' => $nombre,
                            'apellidos' => $apellidos,
                            'correo' => $correo,
                            'password' => $password,
                            'telefono' => $telefono,
                            'foto' => $usuario.'.'.$extension ); //El nombre de la foto de cada uusario sera el nombre de su usuario, para de esta forma llevar un control y que las fotos no se repitan y se sobreescriban

        //Aqui es donde se hace la validacion que el archivo sea una foto con extensiones de imagenes frecuentes y no un formato .docs o un pdf por ejemplo
        if($extension != 'png' && $extension != 'jpg' && $extension != 'PNG' && $extension != 'JPG' && $extension != 'jpeg' && $extension != 'JPEG'){
            echo '<script> alert("Error al subir el archivo intenta con otro") </sript>';
        }else {
            //Una vez que se ha cargado la imagen a los archivos temporales de php, esta funcion la mueve de ahi y la coloca en la direccion donde se guardaran las fotos ya con el nombre presonalizado por cada usuario, que es su matricula
            move_uploaded_file($_FILES['foto']['tmp_name'], 'fotosAdmin/'.$usuario . '.' . $extension);

            //Despues de que se ha guardado la imagen en la carpeta, se manda llamar la funcion del modelo en la cual se pasan el objeto con los datos del formulario para ser guardado
            $respuesta = crud1::agregarUsuario($datosUsuario);

            //Se recibe la respuesta del metodo y si esta es exitosa se manda un mensaje de notificacion al cliente y se reenvia al usuario a la lista de todos los usuarios para que vea la insercion del nuevo usuario (admin).
            if($respuesta == "success"){
                echo '<script> 
                            alert("Datos guardados correctamente");
                            window.location.href = "index.php?action=listaDeUsuarios"; 
                      </script>';                
            }else{
                //En caso de haber un error se queda en la misma pagina y le notifica al usuario
                echo '<script> alert("Error al guardar") </script>';
            }
        }
    }

    
    // Método para editar los datos del usuario y regresar el mensaje
    // correspondiente a la vista
    public function editarUsuario() {
        $admin_id = $_POST["id"];
        $usuario = $_POST["usuario"];
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $correo = $_POST["correo"];
        $password = $_POST["password"];
        $telefono = $_POST["telefono"];

        $fotoActual = $_POST["fotoActual"];

        //Para saber el nombre de la foto se manda llamar esta funcion
        $nombreArchivo = basename($_FILES['foto']['name']);

        //Se concatena al nombre la carpeta en donde se guardaran todas las fotos cargadas por los usuarios
        $directorio = 'fotosAdmin/' . $nombreArchivo;

        //Para hacer algunas validaciones y el usuario por ejemplo no pase como foto una archivo pdf se extrae la extension de la foto
        $extension = pathinfo($directorio , PATHINFO_EXTENSION);

        // Si no seleccionó una foto se verifica para dejar la foto actual
        if($nombreArchivo == ""){
            $foto = $fotoActual;
        }else{
            
            if($extension != 'png' && $extension != 'jpg' && $extension != 'PNG' && $extension != 'JPG' && $extension != 'jpeg' && $extension != 'JPEG'){
                echo '<script> alert("Error al subir el archivo intenta con otro") </sript>';
                
                $foto = $_POST['fotoActual'];

            }else{

                //En caso de que el usuario haya querido ademas de actualizar sus datos en tipo texto, tambien editar la foto, entra a esta parte del if en donde crea una nueva foto, o sobreescibe la existente y la almacena en la variable foto la cual sera almacenada con los datos realizado.

                move_uploaded_file($_FILES['foto']['tmp_name'], 'fotosAdmin/'.$usuario . '.' . $extension);

                $foto = $usuario . '.' . $extension;


                
            }
        }


        //Todos los datos obtenidos del formulario son guardados en un objeto para luego ser pasados al modelo en donde seran almacenados en su respectiva tabla
        $datosUsuario = array('admin_id' => $admin_id,                            
                            'nombre' => $nombre,
                            'apellidos' => $apellidos,
                            'correo' => $correo,
                            'password' => $password,
                            'telefono' => $telefono,
                            'foto' => $foto);

        //Despues de que se ha guardado la imagen en la carpeta, se manda llamar la funcion del modelo en la cual se pasan el objeto con los datos del formulario para ser guardado
        $respuesta = crud1::editarUsuario($datosUsuario);

        //Se recibe la respuesta del metodo y si esta es exitosa se manda un mensaje de notificacion al cliente y se reenvia al usuario a la lista de todos los usuarios para que vea la insercion del nuevo usuario (admin).
        if($respuesta == "success"){
            echo '<script> 
                        alert("Datos guardados correctamente");
                        window.location.href = "index.php?action=listaDeUsuarios"; 
                  </script>';                
        }else{
            //En caso de haber un error se queda en la misma pagina y le notifica al usuario
            echo '<script> alert("Error al guardar") </script>';
        }
    }

    // Método para traer los datos de un admin, recibir los datos del modelo y
    // enviarlos a la vista, (parámetro: admin_id)
    public function getAdminById($admin_id) {
        // Se recibe la respuesta del modelo
        $respuesta = crud1::getAdminById($admin_id);

        // Se retorna la respuesta
        return $respuesta;
    }

    // Método para enviar el id del usuario (con GET) a eliminar al modelo
    public function eliminarUsuario() {
        $respuesta = crud1::eliminarUsuario($_GET["id"]);

        // Si el modelo realiźó la eliminacipon correctamente se muestra el mensaje
        if($respuesta){
            echo '<script> 
                        alert("Usuario eliminado");
                        window.location.href = "index.php?action=listaDeUsuarios"; 
                  </script>'; 
        }else{
            echo '<script> 
                        alert("Ha ocurrido un error -> ERR_DELETE_USER!");
                  </script>';
        }
    }


    # CUPONES -----------------------------
        # -----------------
    // Método para generar los datos de un cupón y enviarlos al modelo
    public function generarCupon() {
        // Genera numeros pseudoaleatorios entre el rango especificado
        // El número generado será el id y el password(inicial) del cupón
        $id = $password = random_int(10000, 99999);
        // Se establece la fecha de expiración
        $expiracion = Date("2018-11-22");

        // Se recibe la respuesta del modelo. Parámetro: id, password y fecha
        $respuesta = crud1::generarCupon($id,$password,$expiracion);

        // Si el modelo generó con éxito el cupón se muestra el mensaje prtinente
        if($respuesta){
             echo '<script> 
                        alert("Cupón Generado Correctamente!!!");
                        window.location.href = "index.php?action=listaDeCupones"; 
                  </script>'; 
        }else{ // Si no se generó muestra el mensaje de error
            echo '<script> 
                        alert("Error -> ERR_COUPON_INSERT");                        
                  </script>';
        }
    }
}