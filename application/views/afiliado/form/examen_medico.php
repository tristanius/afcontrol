	<caption><strong style="color: #3E6F9E">Examenes medicos: </strong></caption>
	<button class="button" type="button" data-open="form_examen"> + </button>

	<div class="large reveal" id="form_examen" style="width: 90%" data-reveal>
		<button class="close-button" data-close aria-label="Close Accessible Modal" type="button">
	    	<span aria-hidden="true">&times;</span>
	  	</button>
		<fieldset>
			<input type="hidden">
			<legend>Agregar un nuevo examen medico:</legend>
			
			<div class="grid-x">
				<div class="cell medium-6 large-6 padding1ex">
					<label>
						Fecha examen: <input type="text" ng-model="examen.fecha_examen">
					</label>
					<label>
						Peso: <input type="text" ng-model="examen.peso">
					</label>
					<label>
						Estatura: <input type="text" ng-model="examen.estatura">
					</label>
					<label>
						Presion Arterial: <input type="text" ng-model="examen.presion_arterial">
					</label>
					<label>
						Tipo de sangre/RH: <input type="text" ng-model="examen.rh">
					</label>
					<label>
						Es apto?: <input type="checkbox" ng-model="examen.apto_actividad">
					</label>
					<label>
						Observaciones: <textarea ng-model="examen.observaciones" rows="2"></textarea>
					</label>
				</div>

				<div class="cell medium-6 large-6 padding1ex">
					<label>
						Enfermedades: <textarea ng-model="examen.enfermedades" rows="2"></textarea>
					</label>
					<label>
						Alergias: <textarea ng-model="examen.alergias" rows="2"></textarea>
					</label>
					<label>
						Vacunas: <textarea ng-model="examen.vacunaas" rows="2"></textarea>
					</label>
					<label>
						Medicamentos: <textarea ng-model="examen.Medicamentos" rows="2"></textarea>
					</label>
				</div>
			</div>
			<button class="button" ng-click="addExamen('afiliado/add_contact/', examen, af.idafiliado)"> + </button>
		</fieldset>
	</div>


	<table class="font11">
		<thead>
			<tr>
				<th>No.</th>
				<th>Fecha de examen</th>
				<th>Tipo</th>
				<th>Fecha registro</th>
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