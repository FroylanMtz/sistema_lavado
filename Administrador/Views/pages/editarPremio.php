<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">Editar Premios</h3>
    </div> 
    	<div class="card-body">
    		<form method="post">
        	<?php
			$editarPremio = new Controlador2();
			$editarPremio -> editarPremiosController();
			$editarPremio -> actualizarPremioController();
			?>
			</form>          	
        </div>
</div>
