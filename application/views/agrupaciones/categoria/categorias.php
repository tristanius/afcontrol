<section ng-controller="categoria_crud">
	<fieldset class="callout myform ">
		<div class="grid-x">
			<div class="large-4 medium-6" style="margin-bottom: 2px">
				<b>
				Agregar un nueva categoria:
				</b>
				<button class="button primary rounded">+</button>

			</div>
		</div>
		<fieldset class="callout primary regularForm grid-x">
			<div class="grid-x medium-6 small-12 large-4">
				<label class="cell small-12 medium-3 largue-2 text-right">Nombre: </label> 
				<input class="cell" type="text" name="">
			</div>
			<div class="grid-x medium-6 large-4">
				<label class="cell small-12 medium-3 largue-2 text-right">Categoria: </label> 
				<input class="cell" type="text" name="">
			</div>
			<div class="grid-x medium-12 small-12">
				<label class="cell small-12 medium-3 largue-2 text-right">Descripcion:</label> 
				<textarea></textarea>
			</div>
		</fieldset>
	</fieldset>

	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Grupos</th>
				<th>Descripcion</th>
				<th>Estado</th>
				<th>opciones</th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>
</section>