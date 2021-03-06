<section ng-controller="list_afiliados">
	<div class="myform grid-x font11">
		<small class="cell large-12 medium-12 small-12">Campos de busqueda, si necesitas un valor especifico usa los siguientes campos y presiona consultar; pero si deseas consultar el listado general dejalos vacios y dale click a consultar.</small>
		
		<div class="cell large-3 medium-4 input-group padding1ex" >
			<span class="input-group-label">Identificación: </span>
			<input class="input-group-field" type="text" ng-model="buscador.identificacion">
		</div>
		<div class="cell large-3 medium-4 input-group padding1ex" >
			<span class="input-group-label">Nombres: </span>
			<input class="input-group-field" type="text" ng-model="buscador.nombres">
		</div>
		<div class="cell large-3 medium-4 input-group padding1ex" >
			<span class="input-group-label">Apellidos: </span>
			<input class="input-group-field" type="text" ng-model="buscador.apellidos">
		</div>
		<div class="cell large-3 medium-4 input-group padding1ex" >
			<span class="input-group-label">Estado: </span>
			<select ng-model="buscador.estado_activo">
				<option value="1">Activo</option>
				<option value="2">Inctivo</option>
			</select>
		</div>
		<div class="cell large-3 medium-4 padding1ex">
			<button class="button padding1ex" ng-click="getListAfiliados(buscador,'', '')">Consultar</button>
		</div>

	</div>
	<br ng-init="setDatatable('#tabla_afiliado')">

	<div ng-if="0">
		Cargando: <img src="<?= base_url('assets/img/loader.gif') ?>">		
	</div>

	<div class="table-scroll" >
		<table id="tabla_afiliado" class="mytabla" ng-if="showList" style="width: 100%">
			<thead>
				<tr>
					<th></th>
					<th>Identificacion</th>
					<th>Nombre</th>
					<th>Apellidos</th>
					<th>Estado</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="af in listado_afiliados track by $index">
					<td ng-bind="af.idafiliado"></td>
					<td ng-bind="af.identificacion"></td>
					<td ng-bind="af.nombres"></td>
					<td ng-bind="af.apellidos"></td>
					<td ng-bind="(af.estado_activo?'Activo':'Inactivo')"></td>
					<td> 
						<button class="button padding5px" 
							ng-click="addNewTab('afiliado/edit/'+af.idafiliado,'Detalles: '+af.nombres+' '+af.identificacion)">
							<small>Detalles</small>
						</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</section>