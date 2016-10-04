

	<div class="medium-11 div-center panel ofhidden">
		<a href="<?= site_url('afiliado/ver/'.$fila->idafiliado) ?>" class="button redondo padding1ex" data-icon="W"></a>

		<h3>¿Confirma que desea terminar esta afiliación?</h3>

		<div>
			<b>Nombres</b>:<?= $fila->nombres." ".$fila->apellidos ?>
		</div>
		<div>
			<b>Afiliado al grupo: </b><?= $fila->nombre_grupo ?> (<a href="<?= site_url('crud/by/categoria') ?>" target="_blank">Ver categorias</a>)
		</div>
		<hr>

		<form action="<?= site_url('afiliado/desfiliacion/'.$fila->idafiliado_grupo) ?>">
			<button class="button alert padding1ex"> Aceptar </button>
		</form>
		
	</div>