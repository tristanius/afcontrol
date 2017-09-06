<section ng-controller="form_afiliado">
	<div class="grid-x"> 
		<div class="cell auto text-left">
			Edit:
			<div ng-if="!af.idafiliado" class="inline_block">
				<i class="fa fa-pencil" aria-hidden="true"></i>
				<div class="switch" style="display: inline;">
				  	<input class="switch-input" id="exampleSwitch" type="checkbox" name="exampleSwitch">
				  	<label class="switch-paddle" for="exampleSwitch" style="vertical-align: middle;">
				    	<span class="show-for-sr">Edit</span>
				  	</label>
				</div>
			</div>
		</div>
		<div class="cell auto text-right">			
			<button ng-if="af.idafiliado" class="button alert margin-none padding1ex">
				<i class="fa fa-trash" aria-hidden="true"></i>
			</button>
		</div>
		<br>
	</div>
	<fieldset>
		<div class="grid-y">
			<div class="grid-x cell">
				<div class="callout warning" ng-show="saved" ng-bind="saved-msj"></div>

				<fieldset class="cell small-10 medium-2 large-2">
					<!-- foto del afiliado -->
					<img ng-src="{{ af.foto?af.foto:'<?= base_url('assets/img/icon.png') ?>'; }}" 
						class="thumbnail" 
						alt="Photo of Uranus."
						style="width: 100%;" 
					/>
					<button class="button" ng-if="af.idafiliado">Cargar foto</button>
				</fieldset>

				<fieldset class="cell medium-10 large-10">					
					<div class="grid-x">
						<div class="cell medium-4 large-4 padding1ex">
							<caption><strong style="color: #3E6F9E">Datos personales: </strong></caption>
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
						<div class="cell medium-4 large-4 padding1ex">
							<caption><strong style="color: #3E6F9E">Otros datos: </strong></caption>							

							<div>
								<label>
									Tipo de sangre: <input type="text" ng-model="af.tipo_sanguineo" placeholder="EJ: A+">
								</label>

								<label>
									Talla actual: <input type="text" ng-model="af.talla" placeholder="EJ: 14/16/S/M/L/XL">
								</label>

								<label>
									fecha nacimiento:
									<input type="text" class="datepicker" ng-model="af.fecha_nacimiento" placeholder="ingrese una fecha">
								</label>

								<label>
									Entidad de salud:
									<input type="text" ng-model="af.entidad_salud" placeholder="ingrese una fecha">
								</label>
							</div>
						</div>
						<div class="cell padding1ex medium-4 large-4">
							<caption><strong style="color: #3E6F9E">Datos de localización: </strong></caption>
							<label>
								Telefono: <input type="text" ng-model="af.telefono" placeholder="No. de identificación">
							</label>
							<label>
								Movìl: <input type="text" ng-model="af.telefono_movil" placeholder="No. de identificación">
							</label>
							<label>
								Dirección: <input type="text" ng-model="af.direccion" placeholder="No. de dirección">
							</label>
							<label>
								Correo Electronico: <input type="text" ng-model="af.correo" placeholder="Correo-E">
							</label>
						</div>
						<div class="cell">
							Guardar:
							<button class="button success margin-none padding1ex" ng-click="Guardar()"> 
								<span class="text-white" data-icon="&#xe058;" ></span>
							</button>
						</div>
					</div>
				</fieldset>

				<fieldset class="cell  medium-12 large-6">					
					<?php $this->load->view('afiliado/form/contactos', array()); ?>
				</fieldset>	

				<fieldset class="cell medium-6 large-6" ng-if="af.idafiliado">				
					<?php $this->load->view('afiliado/form/docs', array()); ?>
				</fieldset>

				<fieldset class="cell medium-5 large-4"  ng-if="af.idafiliado">
					<?php $this->load->view('afiliado/form/examen_medico', array()); ?>
				</fieldset>

				<fieldset class="cell medium-7 large-5"  ng-if="af.idafiliado">
					<?php $this->load->view('afiliado/form/afiliacion_grupo', array()); ?>
				</fieldset>
			</div>
		</div>

	</fieldset>
</section>
<script type="text/javascript">
	$(document).ready(function(){
		$(document).foundation();
	});
</script>