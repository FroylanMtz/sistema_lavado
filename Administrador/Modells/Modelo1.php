<?php

class Modelo1 {


    public function mostrarPagina($enlace){

        if($enlace == 'dashboard' ||
            $enlace == 'usuarios' ||
            $enlace == 'listaDeUsuarios' ||
            $enlace == 'verUsuario' ||
            $enlace == 'editarUsuario' ||
            $enlace == 'eliminarUsuario' ||
            $enlace == 'cupones' ||
            $enlace == 'visitas' ||
            $enlace == 'verPromociones'
        ){

            $pagina = 'Views/pages/'. $enlace .'.php';
        
        }else{
            
            $pagina = 'Views/pages/dashboard.php';
        
        }

        return $pagina;
    }

}