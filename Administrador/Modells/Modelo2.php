<?php

class Modelo2 {


    public function mostrarPagina($enlace){

        if($enlace == 'inicio' || $enlace == "registroPromociones" || $enlace == "verPromociones" || $enlace == "verCupones" || $enlace == "registroCupones" || $enlace == "editarCupones" || $enlace == "editarPromocion" || $enlace == "navegacion2"){

            $pagina = 'Views/pages/'. $enlace .'.php';
        
        }else if($enlace == 'index'){
            
            $pagina = 'Views/pages/inicio.php';
        }else{
            
            $pagina = 'Views/pages/inicio.php';
        }

        return $pagina;
    }
}