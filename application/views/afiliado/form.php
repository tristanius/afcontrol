<section ng-controller="form_afiliado" class="myform">
	<div class="grid-x">
		<div class="cell large-12 medium-12 text-right" ng-if="af.idafiliado">			
			<button  class="button alert margin-none padding1ex" ng-click="inactivate('/afiliado/inactivate/', af.idafiliado)">
				<i class="fa fa-trash" aria-hidden="true"></i>
			</button>
		</div>
		<div id="saved_msj" class="cell large-12 medium-12 callout {{saved?'success':'alert'}} nodisplay" ng-show="saved" ng-bind="saved_msj"></div>
	</div>
	<fieldset ng-init="initAfiliado(<?= isset($idafiliado)?$idafiliado:NULL; ?>)">
		<div class="grid-y">
			<div class="grid-x cell">
				<fieldset class="cell small-10 medium-2 large-2">
					<h6 ng-if="af.idafiliado">Estado: <span ng-bind="af.estado_activo?'Activo':'Inactivo'"></span></h6>
					<!-- foto del afiliado -->
					<img ng-src="{{ af.foto?af.foto:'<?= base_url('assets/img/icon.png') ?>'; }}" 
						class="thumbnail" 
						alt="Foto de afiliado."
						style="width: 100%;" 
					/>
					
					<div>
						<label id="btn-foto" for="foto" class="button padding1ex" style="display: inline;" ng-show="active_upload" >
							Add. foto
							<input type="file" id="foto" class="show-for-sr" onchange="angular.element(this).scope().activeUpload();" />
						</label> 
						&nbsp;
						<button class="button success padding1ex" 
							ng-click='upload("afiliado/upload_doc/"+af.idafiliado+"/1", "img", "#foto")'  ng-show="!active_upload">
							<i ng-show="!active_upload" class="primary" data-icon="&#xe030;"></i> Cargar
						</button>
						<img src="<?= base_url('assets/img/loader.gif') ?>" ng-show="uploading">
					</div>
					<br>
					<br>
					<p>
						Guardar
						<button class="button success margin-none padding1ex" ng-click="guardar()"> 
							<span class="text-white" data-icon="&#xe058;" ></span>
						</button>
					</p>
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
								Nombres: <input type="text" ng-model="af.nombres" placeholder="por favor ingrese sus nombres">
							</label>
							
							<label>
								Apellidos: <input type="text" ng-model="af.apellidos" placeholder="por favor ingrese sus apellidos">
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

								<label ng-init="datepicker('.datepicker')">
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
								Movìl: <input type="text" ng-model="af.movil" placeholder="No. de identificación">
							</label>
							<label>
								Dirección: <input type="text" ng-model="af.direccion" placeholder="No. de dirección">
							</label>
							<label>
								Correo Electronico: <input type="text" ng-model="af.correo" placeholder="Correo-E">
							</label>
							 <label>
							 	Tipo registro:
								<select name="tipo_registro" ng-model="af.tipo_registro" ng-init="af.tipo_registro = 'Deportista'">
									<option value="Deportista">Deportista</option>
									<option value="Contribuyente">Contribuyente</option>
									<option value="Servicio de formacion deportiva">Servicio de formacion deportiva</option>
								</select>
							</label>
						</div>
					</div>
				</fieldset>

				<fieldset class="cell  medium-12 large-6">					
					<?php $this->load->view('afiliado/form/contactos', array()); ?>
				</fieldset>	

				<fieldset class="cell medium-6 large-6" ng-if="af.idafiliado">				
					<?php $this->load->view('afiliado/form/docs', array()); ?>
				</fieldset>

				<fieldset class="cell medium-5 large-6"  ng-if="af.idafiliado">
					<?php $this->load->view('afiliado/form/examen_medico', array()); ?>
				</fieldset>

				<fieldset class="cell medium-7 large-6"  ng-if="af.idafiliado">
					<?php $this->load->view('afiliado/form/afiliacion_grupo', array()); ?>
				</fieldset>
			</div>
		</div>

	</fieldset>
</section>

<?php $this->load->view('afiliado/form/jquery_script'); ?>