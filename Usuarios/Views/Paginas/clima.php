
<!--Simple pagina que muestra el clima dentro de 4 dias en ciudad victoria, es un plogin de la pagina weather.com, es como un iframe incrustado en esta pagina-->

<!--Breadcrumb-->
<div class="col s12 mt-5 " id="pan" >
    <a href="index.php?pagina=inicio" class="breadcrumb"> Inicio </a>
    <a href="index.php?pagina=clima" class="breadcrumb"> Clima </a>
</div>

<!--Titulo de la pagina-->
<div class="row">
    <h4> Clima Actual </h4>
</div>

<!--Esta es una tarjeta color azul que en su interior esta contenido el iframe que muestra el clima con algunos graficos de nubes o soles o cosas asi-->
<div class="row">
    <div class="col s12 m12">
        <div class="card blue darken-4">
            
            <div class="section"></div>
            <div id="cont_62fca510faeeae972b6ebeb23f9385c0">

                <script type="text/javascript" async src="https://www.meteored.mx/wid_loader/62fca510faeeae972b6ebeb23f9385c0">
                </script>

            </div>
            <div class="section"></div>

        </div>
    </div>
</div>

