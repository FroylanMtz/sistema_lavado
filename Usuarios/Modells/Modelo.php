<?php

//Clase modelo que se encarga de generar el enlace y pasarselo al controlador de la pagina que se desea
class Modelo {

    //Funcion que valida la pagina a mostrar
    public function mostrarPagina($enlace){
        
        //Aqui se validan todas las posibles rutas dentro de la aplicacion
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
           $enlace == 'cupones' ||
           $enlace == 'misPremios'){

            //se lo manda al controlador la pagina para que este la muestre al usuario
            $pagina = 'Views/Paginas/'. $enlace .'.php';
        
        }else if($enlace == 'index'){
            
            //Encaso de que el parametro de la pagina sea index se va a la pagina de inicio
            $pagina = 'Views/Paginas/inicio.php';
        
        }else{
            
            //Y por ultimo se valida si hay una lista blanca
            $pagina = 'Views/Paginas/inicio.php';
        
        }

        //Se retorna la pagina ya validada al controlador para que la muestra la usuario
        return $pagina;
    }

}