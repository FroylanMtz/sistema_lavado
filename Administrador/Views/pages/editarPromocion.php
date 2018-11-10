<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">Editar Promocion</h3>
    </div>
    	<div class="card-body">
    		<form method="post">
        	<?php
			$editarPromociones = new crud2();
			$editarPromociones -> editarPromocionController();
			$editarPromociones -> actualizarPromocionController();
			?>
			</form>          	
        </div>
</div>
