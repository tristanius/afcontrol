<section ng-controller="list_afiliado">
	<div ng-init="getListAfiliados(0,25)">
		<table>
			<thead>
				<tr>
					<th>No.</th>
					<th>Identificacion</th>
					<th>Nombre</th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="af in afiliados">
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div ng-if="!afiliados">
		<img src="<?= base_url('assets/img/loader.gif') ?>">		
	</div>
</section>