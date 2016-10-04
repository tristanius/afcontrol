
	<!-- -->
	<section ng-app="afiliado" ng-controller="ver" class="div-center medium-11 panel">
		<a href="<?= site_url('afiliado/lista') ?>" class="button redondo padding1ex warning" data-icon="W"></a> Ir a listado de afiliados
		&nbsp;&nbsp;&nbsp;&nbsp;

		<a href="<?= site_url('afiliado/edit') ?>/{{af.idafiliado}}" class="button redondo padding1ex" data-icon="&#xe01e;"></a> Editar
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

		<a href="<?= site_url('afiliado/examen_medico/') ?>/{{ af.idafiliado }}" class="button redondo info padding1ex" data-icon="&#xe00c;"></a> Ficha Medica

		<div class="bg-white ofhidden" class="columns">
			<h3>Datos del afiliado</h3>
			<hr>

			<div class="large-3 column">
				<img class="th" style="max-width:100%" src="<?= base_url() ?>{{af.ruta+af.nombre_img}}">
				<small>Puedes modificar usando el lapíz de arriba.</small>
			</div>

			<div class="large-9  column">
				<table class="bordered column">
					<caption><h4>Información basica</h4></caption>
					<tr>
						<td>
							<label><b>Identificacion</b></label>
							<p>{{ af.identificacion }}</p>
						</td>

						<td>
							<label><b>Tipo de identificacion</b></label>
							<p>{{ af.tipo_identificacion }}</p>
						</td>

						<td>
							<label><b>Fecha nacimiento</b></label>
							<p>{{af.fecha_nacimiento}}</p>
						</td>

						<td>
							<label><b>Nombres</b></label>
							<p>{{af.nombres}}</p>
						</td>
					</tr>

					<tr>
						<td>
							<label><b>Apellidos</b></label>
							<p>{{af.apellidos}}</p>
						</td>

						<td>
							<label><b>Correo</b></label>
							<p>{{af.correo}} <span class="white">.</span></p>
						</td>

						<td>
							<label><b>tipo sanguineo</b></label>
							<p>{{af.tipo_sanguineo}} <span class="white">.</span></p>
						</td>

						<td>
							<label><b>Telefono</b></label>
							<p>{{af.telefono}} <span class="white">.</span></p>
						</td>
					</tr>

					<tr>
						<td>
							<label><b>Direccion</b></label>
							<p>{{af.direccion}} <span class="white">.</span></p>
						</td>

						<td>
							<label><b>Entidad de salud</b></label>
							<p>{{af.entidad_salud}}<span class="white">.</span></p>
						</td>
						<td>
							<label><b>tipo de registro</b></label>
							<p>{{af.tipo_registro}} </p>
						</td>
					</tr>

					<tr>
						<td>
							<label><b>Talla</b></label>
							<p>{{af.talla}} <span class="white">.</span></p>
						</td>
					</tr>
				</table>

				<table class="bordered column">
					<caption>Contacto</caption>
					<tbody>
						<tr>
							<td>
								<label><b>Nombre de la madre</b></label>
								<p>{{af.nombre_familiar1}}<span class="white">.</span></p>
							</td>

							<td>
								<label><b>Nombre del padre</b></label>
								<p>{{af.nombre_familiar2}}<span class="white">.</span></p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>


			<hr>

			<div class="medium-12 column">
				<h3>Grupos a los que esta afiliado</h3>
				<form action="<?= site_url('afiliado/form_afiliar') ?>" method="post">

					<input name="idafiliado" value="{{ af.idafiliado }}" type="hidden">
					<span>Afiliar:</span> <button class="redondo padding1ex" data-icon="-"></button>
				</form>

				<table  style="width:100%" id="myTable" class="cell-border compact hover nowrap order-column row-border stripe">
					<thead>
						<tr>
							<th>(x)</th>
							<th>Categoria</th>
							<th>Grupo</th>
							<th>Fecha ingreso</th>
							<th>Fecha retiro</th>
							<th>Mora</th>
							<th>Pago</th>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="g in grupos">
							<td> <a ng-if="g.estado == 1 || g.estado == true" href="<?= site_url('afiliado/confirm_afiliacion/') ?>/{{ g.idafiliado_grupo }}" class="rojo" data-icon='&#xe012;'></a> </td>
							<td>{{g.descripcion}}</td>
							<td>{{g.nombre_grupo}}</td>
							<td>{{g.fecha_inicio}}</td>
							<td>{{g.fecha_fin}}</td>
							<td>{{ getMora(g.mora, g.estado) }}</td>
							<td ng-if="g.estado == 1 || g.estado == true">
								<?php 
								if ($this->session->userdata('tipo') != 'Gestor de Afiliados') {
								?>
								<button ng-click="getPagoBy(g.afiliado_idafiliado, g.idafiliado_grupo)" class="button round padding1ex"> pagos</button>
								<?php
								}
								?>
							<td>
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
		#data-af > div{

		}
		#data p span.white{
			color:white;
		}
	</style>

	<script type="text/javascript">

		var app = angular.module("afiliado", []);
		app.controller("ver", function($scope, $http){
			$scope.af = <?= $af ?>;
			$scope.grupos = <?= $grupos ?>

			$scope.getPagoBy = function(idafiliado, afgrupo){
				window.location.href = "<?= site_url('mensualidad/form_pago') ?>/"+idafiliado+"/"+afgrupo;
			}
			$scope.getMora = function(mora, estado){

				if(estado == 0 || estado == false){
					return "RETIRADO";
				}
				if(mora == 1 || mora == true){
					return "SI";
				}
				return "NO";
			}
		});
	</script>
