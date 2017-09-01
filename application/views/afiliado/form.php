<section ng-controller="form_afiliado">
	<div class="grid-x"> 
		<div class="cell auto text-left">
			Guardar:
			<button class="button success margin-none padding1ex"> 
				<span class="text-white" data-icon="&#xe058;"></span>
			</button>
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

				<fieldset class="cell medium-2 large-2">
					<!-- foto del afiliado -->
					<img ng-src="{{ af.foto?af.foto:'<?= base_url('assets/img/icon.png') ?>'; }}" 
						class="thumbnail" 
						alt="Photo of Uranus."
						style="width: 100%;" 
					/>
					<button class="button" ng-if="af.idafiliado">Cargar foto</button>
				</fieldset>

				<fieldset class="cell medium-10 large-5">					
					<div class="grid-x">
						<div class="cell medium-6 large-6 padding1ex">
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

							<label>
								fecha nacimiento:
								<input type="text" class="datepicker" ng-model="af.fecha_nacimiento" placeholder="ingrese una fecha">
							</label>
						</div>
						<div class="cell medium-6 large-6 padding1ex">
							<caption><strong style="color: #3E6F9E">Datos de localización: </strong></caption>
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
					</div>
				</fieldset>

				<fieldset class="cell  medium-6 large-5">					
					<?php $this->load->view('afiliado/form/contactos', array()); ?>
				</fieldset>	

				<fieldset class="cell medium-6 large-3" ng-if="af.idafiliado">				
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