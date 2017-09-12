<section ng-controller="list_afiliados">

	<fieldset class="myform grid-x font11">


		<small class="cell large-12 medium-12 small-12">Puede usar los filtros que necesites y dejar los demás en blanco, estos ultimos seán ignorados.</small>
		
		<div class="cell large-3 medium-4 input-group padding1ex" >
			<span class="input-group-label">Identificación: </span>
			<input class="input-group-field" type="text">
		</div>

		<div class="cell large-3 medium-4 input-group padding1ex" >
			<span class="input-group-label">Nombres: </span>
			<input class="input-group-field" type="text">
		</div>
		<div class="cell large-3 medium-4 input-group padding1ex" >
			<span class="input-group-label">Apellidos: </span>
			<input class="input-group-field" type="text">
		</div>
		<div class="cell large-3 medium-4 padding1ex">
			<button class="button padding1ex">Buscar</button>
		</div>
	</fieldset>
	<br>

	<div ng-init="getListAfiliados(0,25)">
		<table class="mytabla stack table-scroll">
			<thead>
				<tr>
					<th>Identificacion</th>
					<th>Nombre</th>
					<th>Apellidos</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="af in afiliados">
					<td ng-bind="af.identificacion"></td>
					<td ng-bind="af.nombres"></td>
					<td ng-bind="af.apellidos"></td>
					<td> <button class="button padding5px"><small>Detalles</small></button>	</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div ng-if="!afiliados">
		<img src="<?= base_url('assets/img/loader.gif') ?>">		
	</div>
</section>