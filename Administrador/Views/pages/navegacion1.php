<!-- NAVEGACIÓN -->


 <div class="default-sidebar">
        


    <!-- Begin Side Navbar -->
    <nav class="side-navbar box-scroll sidebar-scroll">
        <!-- Begin Main Navigation -->
        <ul class="list-unstyled">
            <!-- DASHBOARD -->
            <li class="active"> <a href="index.php?action=dashboard"><i class="la la-columns"></i><span>Dashboard</span></a> </li>
        </ul>
        
        <ul class="list-unstyled"> <!-- USUARIOS -->
              <li><a href="#dropdown-app" aria-expanded="false" data-toggle="collapse"><i class="la la-user"></i>Usuarios</a>
                <ul id="dropdown-app" class="collapse list-unstyled pt-0">
                    <li><a href="index.php?action=listaDeUsuarios">Lista de usuarios</a></li>
                    <li><a href="index.php?action=agregarUsuario">Agregar usuario</a></li>
                </ul>
            </li>

            <!-- CUPONES -->
            <li><a href="index.php?action=listaDeCupones" ><i class="la la-ticket"></i><span>Cupones</span></a>                
            </li>

            <!-- VISITAS -->
             <li><a href="#dropdown-authentication" aria-expanded="false" data-toggle="collapse"><i class="la la-car"></i><span>Visitas</span></a>
                <ul id="dropdown-authentication" class="collapse list-unstyled pt-0">
                    <li><a href="index.php?action=visitas">Todas las visitas</a></li>
                    <li><a href="index.php?action=agregarVisita">Agregar visita</a></li>
                </ul>
            </li>

