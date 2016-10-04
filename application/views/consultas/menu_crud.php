	
	<section class="div-center medium-11 panel ofhidden">
	
		<div class="botonera">

			<a href="<?= site_url('afiliado/manejos') ?>" class="button padding1ex warning redondo" data-icon="W"></a>

			<a href="<?= site_url('consulta/by/afiliado') ?>" class="button round padding1ex">Obtener listado de afiliados</a>
			<a href="<?= site_url('consulta/by/mensualidad') ?>" class="button round padding1ex">Listado de pagos</a>
			<a href="<?= site_url('consulta/ficha_medica') ?>" class="button round padding1ex">Listado de fichas medicas</a>
		</div>

		<div class="">
			<div class="bg-white">

				<?= isset($button)?$button:""; ?>
				<?= $gestion ?>
			</div>
		</div>

		<hr>

		<br>
	</section>
	
