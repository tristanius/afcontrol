var dd = {
	content: [
		{
	        image: '<?= base64_encode(file_get_contents('./assets/img/escudo.png')) ?>'
	        width: 200
		},
		{ text:'ALIANZA NORTE FC'},
		{ text:'Informe de pago: Recibo de caja'},
		{ text:'AFILIADO A LA ESCUELA:<?= $per->nombres." ".$per->apellidos ?>'},
		{ text:'Grupo que se esta facturando: <?= $per->nombre_grupo ?>'},
		{
			table: {
				widths: ['*', '*', "*", '*', '*'],
				body: [
					["CONCEPTO","MES CANCELADO","AÑO","VALOR"],
					<?php
						$i = 0;
						foreach ($data as $value) {
						$i = 1;
						?>
						["Pago de mensualidad", "<?= $value->id ?>", "<?= $value->year ?>","<?= $valor ?>"]<?= $i<sizeof($data)?",":""; ?>
						<?php
					}
					?>
				]
			}
		}
	]
}
