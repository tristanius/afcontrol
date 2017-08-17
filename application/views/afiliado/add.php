<div class="row panel-white" ng-controller="add_afiliado" >
	<div class="medium-4 small-12 columns">		
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
				<label>
					Identificación: <input type="text" ng-model="af.identificacion"  placeholder=" No. de identificación ">
				</label>
			</div>

			<div>
				<label>
					Nombre: <input type="text" ng-model="af.nombres"  placeholder=" Su nombre ">
				</label>
			</div>

			<div>
				<label>
					Apellidos: <input type="text" ng-model="af.apellidos" placeholder=" Sus apellidos" >
				</label>
			</div>

		</fieldset>
	</div>

	<div class="medium-4 small-12 columns">		
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

	<div class="medium-4 small-12 columns">
		<fieldset>
			<b><legend>Grupos y categorias</legend>			</b>
		</fieldset>
	</div>
</div>