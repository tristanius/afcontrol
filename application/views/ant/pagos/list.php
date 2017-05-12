	
	<section class="div-center large-11 panel" ng-app="afiliado" ng-controller="lista">
		<div id="crud">
			<div class="botonera">
				<a href="<?= site_url('afiliado/manejos') ?>" class="button padding1ex warning redondo" data-icon="W"></a>
				&nbsp;
			</div>

			<div class="panel ofhidden">
				<form action="" method="" class="">
					<legend>Filtros de busqueda</legend>
					
					<div class="columns">
						<div class="column medium-5">
							<label>Identificación: </label><input type="text" ng-model="search.identificacion" value="">
						</div>
						
						<div class="column medium-5">
							<label>Nombres: </label><input type="text" ng-model="search.nombres" value="">
						</div>
					</div>

					<div class="columns">
						<div class="column medium-5">
							<label>Apellidos: </label><input type="text" ng-model="search.apellidos" value="">
						</div>

						<div class="column medium-5">
							<label>Estado de pagos: </label>
							<select name="test" ng-model="search.mora">
								<option value="">All</option>
								<option value="1">En mora</option>
								<option value="0">Sin mora</option>
							</select>
						</div>
					</div>

					<div class="columns">
						<div class="column medium-6">
							<label>Categoria: </label>
							<select name="" ng-model="search.categoria_idcategoria">
								<option value="">All</option>
								<option ng-repeat="cat in categorias" value="{{ cat.idcategoria }}">{{ cat.descripcion }}</option>
							</select>
						</div>

						<div class="column medium-5">
							<label>Grupo: </label><input type="text" ng-model="search.nombre_grupo" placeholder="Grupo de la categoria" >
						</div>

					</div>
					
					<div></div>
				</form>				
			</div>

			<hr>

			<div class="lista" style="width:100%">
				<table style="width:100%" id="myTable" class="cell-border compact hover nowrap order-column row-border stripe">
					<caption>Lista afiliados ativos para pagos por grupos</caption>
					<thead>
						<tr>
							<th>Identificacion</th>
							<th>Nombres</th>
							<th>Apellidos</th>
							<th>Telefono</th>
							<th>Estado de pagos</th>
							<th>Categoria</th>
							<th>Grupo activo</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="it in afiliados | filter:search:strict">
							<td>{{ it.identificacion }}</td>
							<td>{{ it.nombres }}</td>
							<td>{{ it.apellidos }}</td>
							<td>{{ it.telefono }}</td>
							<td>{{ getMoraGeneral(it.morageneral) }} </td>
							<td>{{ it.descripcion }}</td>
							<td>{{ it.nombre_grupo }}</td>
							<td>
								<a href="<?= site_url('/mensualidad/form_pago/') ?>/{{it.idafiliado+'/'+it.idafiliado_grupo}}" class="button success redondo padding1ex"
									data-icon="&#xe010;"></a>
							</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<th></th>
							<th><nom/th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</section>

	<style type="text/css">
		#myTable_length *{
			width: auto;
		}
		#myTable tr th, #mytable tr td{
			font-size: 11px;
			padding: 2px;
		}
		#mytable tr td .button{
			font-size: 11px;
		}
		#crud input, #crud select{
			height: 3ex;
			padding: 1px;
			margin: 0px;
		}
	</style>

	<script type="text/javascript">		

		var app = angular.module("afiliado", []);
		app.controller("lista", function($scope, $http){
			$scope.categorias = <?= $categorias ?>;
			$scope.afiliados = <?= json_encode($afiliados->result()) ?>;
			$scope.getMoraGeneral = function(mora){
				if(mora == 1 || mora == true ){
					return "En mora de pagos";
				}
				return "OK";
			}
		});


		$(document).ready(function(){
			// DataTable
			$('#myTable').DataTable({
		    	responsive: true,
		    	"language":{ "url":"<?= base_url('assets/js/datatables/spanish.json') ?>" }
		    });		   
		});
	</script>