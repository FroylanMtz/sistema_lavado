<header>
    <nav>
        <div class="nav-wrapper blue darken-4">
            <a href="index.php?pagina=inicio" class="brand-logo"> <img src="Public/img/logo.png" alt="" width="60px" height="60px"> </a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons"> <i class="large material-icons">menu</i> </i></a>
            
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="index.php?pagina=inicio"> <i class="fas fa-home"></i> Inicio </a></li>
                <li><a href="index.php?pagina=ubicacion"> <i class="fas fa-map-marked-alt"></i> Como llegar </a></li>
                <li><a href="index.php?pagina=horario"><i class="fas fa-clock"></i> Horario </a></li>
                <li><a href="index.php?pagina=actualizar_contrasena"> <i class="fas fa-user-edit"></i> Actualizar datos </a></li>
                <li><a href="index.php?pagina=acerca"> <i class="fas fa-info"></i> Acerca de </a></li>
                <li><a href="index.php?pagina=salir"> <i class="fas fa-sign-out-alt"></i> Cerrar sesión </a></li>
            </ul>
            
            
        </div>
        
    </nav>


    <ul class="sidenav blue lighten-1" id="mobile-demo">

        <li> <center> <img  class="circle" src="../Imagenes/<?= $_SESSION['foto'] ?> " alt="" width="150px" height="150px"> </center> </li>
        <li> <center> <strong> <h5> ID: <?= $_SESSION['idUsuario'] ?> </h5> </strong>  </center> </li>
        <li> <center> <strong> <h6> <?= $_SESSION['nombre']  ?> </h6> </strong>  </center> </li>
        
        <li><a href="index.php?pagina=inicio"> <i class="fas fa-home"></i> Inicio </a></li>
        <li><a href="index.php?pagina=ubicacion"> <i class="fas fa-map-marked-alt"></i> Como llegar </a></li>
        <li><a href="index.php?pagina=horario"><i class="fas fa-clock"></i> Horario </a></li>
        <li><a href="index.php?pagina=actualizar_contrasena"> <i class="fas fa-user-edit"></i> Actualizar datos </a></li>
        <li><a href="index.php?pagina=acerca"> <i class="fas fa-info"></i> Acerca de </a></li>
        <li><a href="index.php?pagina=salir"> <i class="fas fa-sign-out-alt"></i> Cerrar sesión </a></li>

    </ul>

</header>