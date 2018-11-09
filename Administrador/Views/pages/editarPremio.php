<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">Editar Premios</h3>
    </div>
    	<div class="card-body">
    		<form method="post">
        	<?php
			$editarPremios = new crud2();
			$editarPremios -> editarPremioController();
			$editarPremios -> actualizarPremioController();
			?>
			</form>          	
        </div>
</div>
