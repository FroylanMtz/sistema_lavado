<?php

//

class Modelo2 {


    public function mostrarPagina($enlace){

        if($enlace == 'inicio'){

            $pagina = 'Views/Paginas'. $enlace .'.php';
        
        }else if($enlace == 'index'){
            
            $pagina = 'Views/Paginas/inicio.php';
        
        }else{
            
            $pagina = 'Views/Paginas/inicio.php';
        
        }

        return $pagina;
    }

}