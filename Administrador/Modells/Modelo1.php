<?php

class Modelo1 {


    public function mostrarPagina($enlace){

        if($enlace == 'dashboard' ||
            $enlace == 'usuarios' ||
            $enlace == 'listaDeUsuarios' ||
            $enlace == 'cupones' ||
            $enlace == 'visitas'){

            $pagina = 'Views/pages/'. $enlace .'.php';
        
        }else{
            
            $pagina = 'Views/pages/dashboard.php';
        
        }

        return $pagina;
    }

}