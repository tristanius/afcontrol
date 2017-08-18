<div class="row panel-white" ng-controller="add_afiliado" >
	<div class="medium-6 small-12 columns">		
		<fieldset>
			<b><legend>Datos personales</legend></b>

			<div>
				<label>TIipo de identificacion: </label>
				<select ng-model="af.tipo_identificacion">
					<option value="Registro Civil">R.C: Registro civíl</option>
					<option value="T.I.">T.I. Tarjeta de identidad</option>
					<option value="C.C.">C.C: Cedula</option>
					<option value="Otro">Otro</option>
				</select>
			</div>

			<div>
				<label>Identificación: <input type="text" ng-model="af.identificacion"  placeholder=" No. de identificación "></label>
			</div>

			<div>
				<label>Nombre: <input type="text" ng-model="af.nombres"  placeholder=" Su nombre "></label>
			</div>

			<div>
				<label>Apellidos: <input type="text" ng-model="af.apellidos" placeholder=" Sus apellidos" ></label>
			</div>

			<div>
				<label>fecha nacimiento: <input type="date" class="datepicker" ng-model="af.fecha_nacimiento" placeholder="ingrese una fecha"></label>
			</div>

			<div>
				<label>Telefono: <input type="text" ng-model="af.telefono" placeholder="digite su telefono" required></label>
			</div>

		</fieldset>
	</div>


	<div class="medium-6 small-12 columns">
		<fieldset>
			<b><legend>Datos adicionales</legend></b>
			<div>
				<label>Correo: <input type="text" ng-model="af.correo" placeholder="Ej: micorreo@sitio.com"></label>
			</div>

			<div>
				<label>Direccion: <input type="text" ng-model="af.direccion" placeholder="Ingrewse aqui la dirección de residencia"></label>
			</div>

			<div>
				<label>Tipo de sangre: <input type="text" ng-model="af.tipo_sangre" placeholder="EJ: A+"></label>
			</div>

			<div>
				<label>Entidad de salud: <input type="text" ng-model="af.entidad_salud" placeholder="Ingrese la empresa de salud que tiene"></label>
			</div>

			<div>
				<label>Talla: <input value="" type="text" ng-model="af.talla" placeholder="Ingrese la empresa de salud que tiene"></label>
			</div>
		</fieldset>
	</div>

	<div class="medium-6 small-12 columns">		
		<fieldset>
			<b><legend>Datos Familiares</legend></b>
			<div>
				<label>
					Nombre de la madre: <input type="text" ng-model="af.nombres"  placeholder=" Nombre completo ">
				</label>
			</div>

			<div>
				<label>
					Nombre del Padre: <input type="text" ng-model="af.apellidos" placeholder=" Nombre completo" >
				</label>
			</div>
			
		</fieldset>
	</div>

	<div class="medium-12 small-12 columns">
		<fieldset>
			<b><legend>Grupos y categorias</legend>			</b>
		</fieldset>
	</div>


	<div class="medium-12 small-12 columns end">
		<fieldset>
			<b><legend>Comfirmar y guardar</legend>			</b>
		</fieldset>
	</div>
</div>