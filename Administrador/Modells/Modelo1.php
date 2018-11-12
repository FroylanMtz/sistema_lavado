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
            $enlace == 'borrarPromociones' ||
            $enlace == 'verPremios' ||
            $enlace == 'registroPremios' ||
            $enlace == 'editarPremio' ||
            $enlace == 'borrarPremio' ||
            $enlace == 'verCupones' ||
            $enlace == 'registroCupon' ||
            $enlace == 'editarCupon' ||
            $enlace == 'listaDeCupones' ||
            $enlace == 'verHorarios' ||
            $enlace == 'generarCupon'
        ){

            $pagina = 'Views/pages/'. $enlace .'.php';
        
        }else{
            
            $pagina = 'Views/pages/dashboard.php';
        
        }

        return $pagina;
    }

}