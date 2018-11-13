<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">Editar Promocion</h3>
    </div> 
    	<div class="card-body">
    		<form method="post">
        	<?php
			$editarPromocion = new Controlador2();
			$editarPromocion -> editarPromocionController();
			$editarPromocion -> actualizarPromocionController();
			?>
			</form>          	
        </div>
</div>
