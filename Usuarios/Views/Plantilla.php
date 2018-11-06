<!DOCTYPE html>
<html>
<head>
		
    <link rel="shortcut icon" href="Public/img/logo.png">
    <link rel="stylesheet" href="Public/css/style.css">
    <link rel="stylesheet" href="Public/css/materialize.min.css">
    <link rel="stylesheet" href="Public/css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <title> Sistema de cupones </title>

    <script src="Public/js/jquery-3.3.1.min.js"></script>

</head>
<body >

    <header> </header>

    <main>
        
        <?php require_once 'Views/Paginas/navegacion.php'; ?>

        
        <div class="container">

            <?php
      
                $controlador = new Controlador();

                $controlador -> mostrarPagina();

            ?>

        </div>

    </main>

    <footer class="page-footer blue darken-4">
        <div class="footer-copyright">
            <div class="container">
                <h6 class="center-align"> ¡Gracias por tu visita! </h6>
            
            </div>
        </div>
    </footer>


    <script src="Public/js/jquery-3.3.1.min.js"></script>
    <script src="Public/js/materialize.min.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfoip2f7_0MCUm26iAtAQ3Slk6Lj72Qjc&callback=initMap"
    async defer></script>

    <script src="Public/js/localizacion.js"></script>
    <script src="Public/js/main.js"></script>



    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
        })
	</script>
	
</body>
</html>