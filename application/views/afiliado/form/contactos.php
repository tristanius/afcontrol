	<div class="grid-x" ng-if="af.idafiliado">
		<div class="cell padding1ex">
			<caption><strong style="color: #3E6F9E">Contactos / Referencia: </strong></caption>
			<button class="button" type="button" data-open="form_contacto"> + </button>

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