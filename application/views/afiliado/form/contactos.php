	<div class="grid-x">
		<div class="cell padding1ex">
			<caption><strong style="color: #3E6F9E">Otros datos: </strong></caption>							

			<div class="grid-x">
				<label class="cell large-6 medium-6 padding1ex">
					Tipo de sangre: <input type="text" ng-model="af.tipo_sangre" placeholder="EJ: A+">
				</label>

				<label class="cell large-6 medium-6 padding1ex">
					Talla actual: <input type="text" ng-model="af.talla" placeholder="EJ: 14/16/S/M/L/XL">
				</label>
			</div>
		</div>

		<div class="cell padding1ex">
			<caption><strong style="color: #3E6F9E">Contactos / Referencia: </strong></caption>
			<button class="button" type="button" data-open="form_contacto" ng-if="!af.idafiliado"> + </button>

			<div class="reveal" id="form_contacto" data-reveal>
				<button class="close-button" data-close aria-label="Close Accessible Modal" type="button">
			    	<span aria-hidden="true">&times;</span>
			  	</button>
				<fieldset>
					<legend>Agregar un nuevo contacto:</legend>
					<label>
						Nombre: <input type="text" ng-model="newcontact.nombre_ref">
					</label>
					<label>
						Telefono: <input type="text" ng-model="newcontact.telefono_ref">
					</label>
					<label>
						Parentesco: <input type="text" ng-model="newcontact.parentescoref">
					</label>
					<button class="button"> + </button>
				</fieldset>
			</div>

			<table class="font11">
				<thead>
					<tr>
						<th>Nombre Contacto</th>
						<th>Telefono</th>
						<th>Tipo</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>					
		</div>
	</div>