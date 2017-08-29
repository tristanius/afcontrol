<section ng-controller="form_afiliado">
	<div class="grid-x"> 
		<div class="cell auto text-left">
			<span>
				<i class="fa fa-pencil" aria-hidden="true"></i>
				<div class="switch" style="display: inline;">
				  	<input class="switch-input" id="exampleSwitch" type="checkbox" name="exampleSwitch">
				  	<label class="switch-paddle" for="exampleSwitch" style="vertical-align: middle;">
				    	<span class="show-for-sr">Edit</span>
				  	</label>
				</div>
			</span>
		</div>
		<div class="cell auto text-right">
			<small>Guardar: </small>
			<button class="button success margin-none padding1ex"> 
				<span class="text-white" data-icon="&#xe058;"></span>
			</button>
			&nbsp;
			&nbsp;
			<small>Eliminar: </small>
			<button class="button alert margin-none padding1ex">
				<i class="fa fa-trash" aria-hidden="true"></i>
			</button>
		</div>
		<br>
	</div>
	<fieldset>
		<div class="grid-y">
			<div class="grid-x cell">

				<fieldset class="cell medium-4 large-2">
					<!-- foto del afiliado -->
					<img ng-src="{{ af.foto?af.foto:'<?= base_url('assets/img/icon.png') ?>'; }}" 
						class="thumbnail" 
						alt="Photo of Uranus."
						style="width: 100%;" 
					/>
					<button class="button" ng-if="!af.idafiliado">Cargar foto</button>
				</fieldset>

				<fieldset class="cell medium-8 large-5">
					<caption><strong style="color: #3E6F9E">Datos personales: </strong></caption>
					
					<div class="grid-x">
						<div class="cell medium-6 large-6 padding1ex">							
							<label>Tipo identificación:
								<select ng-model="af.tipo_identificacion">
									<option value="Registro Civil">R.C: Registro civíl</option>
									<option value="T.I.">T.I. Tarjeta de identidad</option>
									<option value="C.C.">C.C: Cedula</option>
									<option value="Otro">Otro</option>
								</select>
							</label>

							<label>
								No. Identificación: <input type="text" ng-model="af.identificacion" placeholder="No. de identificación">
							</label>

							<label>
								Nombres: <input type="text" ng-model="af.nombre_completo" placeholder="por favor ingrese sus nombres">
							</label>
							
							<label>
								Apellidos: <input type="text" ng-model="af.apellidos_completos" placeholder="por favor ingrese sus apellidos">
							</label>
						</div>

						<div class="cell medium-6 large-6 padding1ex">
							<label>
								fecha nacimiento:
								<input type="text" class="datepicker" ng-model="af.fecha_nacimiento" placeholder="ingrese una fecha">
							</label>

							<label>
								Tipo de sangre: <input type="text" ng-model="af.tipo_sangre" placeholder="EJ: A+">
							</label>

							<label>
								Talla actual: <input type="text" ng-model="af.talla" placeholder="EJ: 14/16/S/M/L/XL">
							</label>
						</div>
					</div>
				</fieldset>

				<fieldset class="cell  medium-8 large-5">
					<caption><strong style="color: #3E6F9E">Datos de contacto: </strong></caption>
					
					<div class="grid-x">
						<div class="cell medium-6 large-6 padding1ex">
							<label>
								Telefono: <input type="text" ng-model="af.identificacion" placeholder="No. de identificación">
							</label>
							<label>
								Movìl: <input type="text" ng-model="af.identificacion" placeholder="No. de identificación">
							</label>
							<label>
								Dirección: <input type="text" ng-model="af.direccion" placeholder="No. de dirección">
							</label>
							<label>
								Correo Electronico: <input type="text" ng-model="af.direccion" placeholder="Correo-E">
							</label>
						</div>
						<div class="cell medium-6 large- padding1ex">
							<label>
								Referencia familiar (1): <input type="text" ng-model="af.referencia_familiar1" placeholder="Nombre del padre/ madre/ pareja">
							</label>

							<label>
								Referencia familiar (2): <input type="text" ng-model="af.referencia_familiar2" placeholder="Nombre de la padre/ madre/ pareja">
							</label>

							<label>
								Comentarios y observaciones:
								<textarea rows="5"></textarea>
							</label>
						</div>
					</div>
				</fieldset>	

				<fieldset class="cell medium-4 large-4" ng-if="!af.idafiliado">				
					<caption><strong style="color: #3E6F9E">Documentos asociados: </strong></caption>

					<button class="button"> + </button>
					<table class="font12">
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

				</fieldset>

				<fieldset class="cell medium-12 large-8"  ng-if="!af.idafiliado">
					<caption><strong style="color: #3E6F9E">Afiliaciones: </strong></caption>
					<button class="button"> + </button>
					<table class="font12">
						<thead>
							<tr>
								<th>Categoria</th>
								<th>Grupo</th>
								<th>Estado</th>
								<th>F. de afiliación</th>
								<th>Detalle</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</fieldset>
			</div>
		</div>

	</fieldset>
</section>