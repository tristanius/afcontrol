	<caption><strong style="color: #3E6F9E">Documentos asociados: </strong></caption>
	<button class="button"> + </button>

	<table class="font11">
		<thead>
			<tr>
				<th>No.</th>
				<th>Clasificación</th>
				<th>Fecha de registro</th>
				<th>Estado</th>
				<th>Ver/descarga</th>
			</tr>
		</thead>
		<tbody>
			<tr ng-repeat="d in af.documentos" ng-if="af.documentos">
				<td ng-bind="d.iddocumento"></td>
				<td ng-bind="d.clasificacion"></td>
				<td ng-bind="d.fecha_registro"></td>
				<td ng-bind="d.estado"></td>
				<td> <a ng-href="{{ '<?= base_url() ?>'+d.ruta+d.documento }}">Descarga</a> </td>
			</tr>
		</tbody>
	</table>