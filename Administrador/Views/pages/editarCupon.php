<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">Editar Cupones</h3>
    </div>
    	<div class="card-body">
    		<form method="post">
        	<?php
			$editarCupones = new crud2();
			$editarCupones -> editarCuponController();
			$editarCupones -> actualizarCuponController();
			?>
			</form>          	
        </div>
</div>
