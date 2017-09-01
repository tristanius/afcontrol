	<caption><strong style="color: #3E6F9E">Documentos asociados: </strong></caption>
	<button class="button"> + </button>

	<table class="font11">
		<thead>
			<tr>
				<th>No.</th>
				<th>Nombre documento</th>
				<th>Ver/descarga</th>
			</tr>
		</thead>
		<tbody>
			<tr ng-repeat="d in af.documentos" ng-if="af.documentos">
				<td ng-bind="d.iddocumento"></td>
				<td ng-bind="d.nombre_documento"></td>
				<td> <a ng-href="{{ d.link }}"></a> </td>
			</tr>
		</tbody>
	</table>