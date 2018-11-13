<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">Editar Horarios</h3>
    </div>
    	<div class="card-body">
    		<form method="post">
        	<?php
			$editarHorarios = new crud2();
			$editarHorarios -> editarHorarioController();
			$editarHorarios -> actualizarHorarioController();
			?>
			</form>          	
        </div>
</div>
