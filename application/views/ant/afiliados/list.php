	
	<!-- -->
	<section class="div-center large-11 panel" ng-app="afiliado" ng-controller="lista">
		<div id="crud">
			<div class="botonera">
				<a href="<?= site_url('afiliado/manejos') ?>" class="button padding1ex warning redondo" data-icon="W"></a>
				&nbsp;
				<a href="<?= site_url('afiliado/form_add') ?>" class="button padding1ex success redondo" data-icon="%"></a>
			</div>

			<div class="lista" style="width:100%">
				<table style="width:100%" id="myTable" class="cell-border compact hover nowrap order-column row-border stripe">
					<caption>Lista de afiliados a la entidad</caption>
					<thead>
						<tr>
							<th>Identificacion</th>
							<th>Nombres</th>
							<th>Apellidos</th>
							<th>Telefono</th>
							<th>Estado de pagos</th>
							<th>Grupos activos</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="it in afiliados">
							<td>{{ it.identificacion }}</td>
							<td>{{ it.nombres }}</td>
							<td>{{ it.apellidos }}</td>
							<td>{{ it.telefono }}</td>
							<td>{{ getMoraGeneral(it.morageneral) }} </td>
							<td>{{ it.cant }}</td>
							<td>
								<a href="<?= site_url('afiliado/ver') ?>/{{it.idafiliado}}" class="button info redondo padding1ex" data-icon="&#xe004;"></a>
								<a href="<?= site_url('afiliado/edit') ?>/{{it.idafiliado}}" class="button redondo padding1ex" data-icon="&#xe01e;"></a>
							</td>
						</tr>
					</tbody>
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
	</style>

	<script type="text/javascript">		

		var app = angular.module("afiliado", []);
		app.controller("lista", function($scope, $http){
			$scope.afiliados = <?= json_encode($afiliados->result()) ?>;
			$scope.getMoraGeneral = function(mora){
				if(mora == 1 || mora == true ){
					return "En mora de pagos";
				}
				return "OK";
			}
		});


		$(document).ready(function(){
			$('#myTable').DataTable({
		    	responsive: true,
		    	"language":{ "url":"<?= base_url('assets/js/datatables/spanish.json') ?>" }
		    });		    
		});
	</script>