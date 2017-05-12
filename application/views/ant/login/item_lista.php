	
				<td><?= $p->idplan ?></td>
				<td><?= $p->origen ?></td>
				<td><?= $p->destino ?></td>
				<td><?= $p->valor ?></td>
				<td>
					<a href="" title="" class="button">Ver</a>
				</td>
				<td>
					<button class="" data-link="<?= site_url('plan/comfir_del/'.$p->idplan) ?>">borrar</button>
				</td>