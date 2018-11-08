<?php

class Modelo2 {


    public function mostrarPagina($enlace){

        if($enlace == 'inicio' || $enlace == "registroPromociones" || $enlace == "verPromociones" || $enlace == "verCupones" || $enlace == "registroCupones"){

        $pagina = 'Views/Paginas'. $enlace .'.php';
        
        }else if($enlace == 'index'){
            
            $pagina = 'Views/Paginas/inicio.php';
        
        }else{
            
            $pagina = 'Views/Paginas/inicio.php';
        
        }

        return $pagina;
    }

}