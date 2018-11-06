<?php

class Modelo {


    public function mostrarPagina($enlace){

        if($enlace == 'inicio' ||
           $enlace == 'acerca' ||
           $enlace == 'actualizar_contrasena' ||
           $enlace == 'clima' ||
           $enlace == 'horario' ||
           $enlace == 'navegacion' ||
           $enlace == 'premios' ||
           $enlace == 'promociones' ||
           $enlace == 'salir' ||
           $enlace == 'ubicacion' ||
           $enlace == 'visitas' ||
           $enlace == 'cupones'){

            $pagina = 'Views/Paginas/'. $enlace .'.php';
        
        }else if($enlace == 'index'){
            
            $pagina = 'Views/Paginas/inicio.php';
        
        }else{
            
            $pagina = 'Views/Paginas/inicio.php';
        
        }

        return $pagina;
    }

}