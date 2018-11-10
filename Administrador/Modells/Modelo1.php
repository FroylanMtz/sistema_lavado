<?php

class Modelo1 {


    public function mostrarPagina($enlace){

        if($enlace == 'dashboard' ||
            $enlace == 'usuarios' ||
            $enlace == 'listaDeUsuarios' ||
            $enlace == 'verUsuario' ||
            $enlace == 'agregarUsuario' ||
            $enlace == 'editarUsuario' ||
            $enlace == 'eliminarUsuario' ||
            $enlace == 'cupones' ||
            $enlace == 'visitas' ||
            $enlace == 'verPromociones' || 
            $enlace == 'registroPromociones'||
            $enlace == 'editarPromocion' ||
            $enlace == 'verPremios' ||
            $enlace == 'registroPremios' ||
            $enlace == 'editarPremio' ||
            $enlace == 'verCupones' ||
            $enlace == 'registroCupon' ||
            $enlace == 'editarCupon'
        ){

            $pagina = 'Views/pages/'. $enlace .'.php';
        
        }else{
            
            $pagina = 'Views/pages/dashboard.php';
        
        }

        return $pagina;
    }

}