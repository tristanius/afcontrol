
	<?php $this->load->view("principal/nav") ?>
	
	<!-- direccion -->
	<?php 
	if (isset($ubicacion)) {
		echo $ubicacion;
	}
	?>

	<!-- contenido -->
	<?= $gestion ?>

	<div class="clearfix"></div>
	<br>
	<br>

	<?php $this->load->view("principal/footer") ?>