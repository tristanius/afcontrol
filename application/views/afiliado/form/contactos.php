	<div class="grid-x" ng-show="af.idafiliado">
		<div class="cell padding1ex">
			<caption><strong style="color: #3E6F9E">Contactos / Referencia: </strong></caption>

			<button class="button" type="button" data-open="form_contacto"> + </button>

			<div class="reveal" id="form_contacto" data-reveal>
				<button class="close-button" data-close aria-label="Close Accessible Modal" type="button">
			    	<span aria-hidden="true">&times;</span>
			  	</button>
				<fieldset>
					<input type="hidden">
					<legend>Agregar un nuevo contacto:</legend>
					<label>
						Nombre: <input type="text" ng-model="newcontact.nombre_ref">
					</label>
					<label>
						Telefono: <input type="text" ng-model="newcontact.telefono_ref">
					</label>
					<label>
						Parentesco: <input type="text" ng-model="newcontact.parentesco_ref">
					</label>
					<button class="button" ng-click="newContact('afiliado/add_contact/', newcontact, af.idafiliado)"> + </button>
				</fieldset>
			</div>

			<div class="scroll">
				<table class="font11">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nombre Contacto</th>
							<th>Telefono</th>
							<th>Tipo</th>
							<th>Opción</th>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="c in af.contactos">
							<td ng-bind="c.idafiliado_contacto"></td>
							<td ng-bind="c.nombre_ref"></td>
							<td ng-bind="c.telefono_ref"></td>
							<td ng-bind="c.parentesco_ref"></td>
							<td > <button ng-click="delContacto(c.idafiliado_contacto)" class="button alert padding5px"> X </button> </td>
						</tr>
					</tbody>
				</table>	
			</div>				
		</div>
	</div>