<div class="div-center medium-11 panel ofhidden">

	<a href="<?= site_url('afiliado/ver/'.$af->idafiliado)?>" class="btn" data-icon="&#xe001;"></a>

	<fieldset>
		<legend>Datos del afiliado:</legend>
		<label for="">Datos de persona: <?= $af->nombres." ".$af->apellidos ?> </label>
		<br>
		<label>identificacion: <?= $af->identificacion ?></label>
	</fieldset>

	<hr>

	<?= $crud ?>
	
</div>