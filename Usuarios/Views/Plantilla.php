<!DOCTYPE html>
<html>
<head>

    <!--Esta es la plantilla en donde se agregan todos los estilos y funcionalidades (javascript) del sistema en general, es decir es la base de todo el sistema visualmente -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="shortcut icon" href="Public/img/logo.png">
    <link rel="stylesheet" href="Public/css/style.css">
    <link rel="stylesheet" href="Public/css/materialize.min.css">
    <link rel="stylesheet" href="Public/css/style.css">
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <title> Sistema de cupones </title>

    <script src="Public/js/jquery-3.3.1.min.js">    </script>
    <script src="Public/js/sweetalert2.all.min.js"> </script>

</head>
<body >

    <header> </header>

    <main>
        <!--Este de aqui se encarga de poner la navegacion de la pagina que son los botones a la izquierda si la esta reducido y los botones en la parte derecha en el header si esta extendida la pagina-->
        <?php require_once 'Views/Paginas/navegacion.php'; ?>

        
        <div class="container">

            <?php
                //Se manda llamar al controlador para validar las paginas y mostrarlas 
                $controlador = new Controlador();
                $controlador -> mostrarPagina();
                
            ?>

        </div>

    </main>

    <!--EL footer que aparecerá en todas las paginas-->
    <footer class="page-footer blue darken-4">
        <div class="footer-copyright">
            <div class="container">
                <h6 class="center-align"> ¡Gracias por tu visita! </h6>
            </div>
        </div>
    </footer>

    <!--Los js's que necesita el sistema para su mejor funcionamiento-->
    <script src="Public/js/jquery-3.3.1.min.js"></script>
    <script src="Public/js/materialize.min.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfoip2f7_0MCUm26iAtAQ3Slk6Lj72Qjc&callback=initMap"
    async defer></script>

    <script src="Public/js/localizacion.js"></script>
    <script src="Public/js/main.js"></script>


    <!--Este script inicializa el menu de navegacion cuando la pagina esta reducida-->
    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
        })
	</script>
	
</body>
</html>