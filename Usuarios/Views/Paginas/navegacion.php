<!--Navegacion de la aplicacion se manda llamar cuando se carga plantilla que se manda llamar cuando se carga el archivo index.php-->
<header>
    <nav>
        <!-- Este menu de aqui es el que aparece si la pagina esta en extendia ya sea en un navegador o pantalla grande. Este menu aparece en la parte superior y recargado a la derecha, de igual forma el logo se pasa al lado izquiedo de la pagina-->
        <div class="nav-wrapper blue darken-4">
            <a href="index.php?pagina=inicio" class="brand-logo"> <img src="Public/img/logo.png" alt="" width="60px" height="60px"> </a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons"> <i class="large material-icons">menu</i> </i></a>
            
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="index.php?pagina=inicio"> <i class="fas fa-home"></i> Inicio </a></li>
                <li><a href="index.php?pagina=ubicacion"> <i class="fas fa-map-marked-alt"></i> Como llegar </a></li>
                <li><a href="index.php?pagina=horario"><i class="fas fa-clock"></i> Horario </a></li>
                <li><a href="index.php?pagina=actualizar_contrasena"> <i class="fas fa-user-edit"></i> Actualizar contraseña </a></li>
                <li><a href="index.php?pagina=acerca"> <i class="fas fa-info"></i> Acerca de </a></li>
                <li><a href="index.php?pagina=salir"> <i class="fas fa-sign-out-alt"></i> Cerrar sesión </a></li>
            </ul>
            
            
        </div>
        
    </nav>

    <!--Este menu de aqui aparece cuando el navegador esta pequeño o se esta navegando en un dispositivo con pantalla pequeña, en el caso de este menu esta oculto y para poder apreciarlo esta un botoncito con tres lineas, para este menu el logo del establecimiento aparece en el centro de la parte  superior de la pagina-->
    <ul class="sidenav blue lighten-1" id="mobile-demo">
        <li> <center> <strong> <h5> ID: <?= $_SESSION['idCupon'] ?> </h5> </strong>  </center> </li>
        
        <li><a href="index.php?pagina=inicio"> <i class="fas fa-home"></i> Inicio </a></li>
        <li><a href="index.php?pagina=ubicacion"> <i class="fas fa-map-marked-alt"></i> Como llegar </a></li>
        <li><a href="index.php?pagina=horario"><i class="fas fa-clock"></i> Horario </a></li>
        <li><a href="index.php?pagina=actualizar_contrasena"> <i class="fas fa-user-edit"></i> Actualizar contraseña </a></li>
        <li><a href="index.php?pagina=acerca"> <i class="fas fa-info"></i> Acerca de </a></li>
        <li><a href="index.php?pagina=salir"> <i class="fas fa-sign-out-alt"></i> Cerrar sesión </a></li>

    </ul>

</header>