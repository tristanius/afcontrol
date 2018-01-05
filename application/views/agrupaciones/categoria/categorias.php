<section ng-controller="crud">

	<fieldset class="callout myform ">
		<div class="grid-x" ng-init="addView=false">
			<div class="large-4 medium-6" style="margin-bottom: 2px">
				<b>
				Agregar un nueva categoria:
				</b>
				<button class="button primary rounded" ng-click="addView=true">+</button>
			</div>
		</div>
		<fieldset class="callout primary regularForm grid-x" ng-show="addView">
			<div class="grid-x padding1ex large-10 medium-12">
				<label class="cell medium-2 large-1 text-right padding1ex">Nombre: </label> 
				<input class="cell" type="text" name="">
			</div>
			<div class="grid-x padding1ex large-10 medium-12">
				<label class="cell medium-2 large-1 text-right padding1ex">Codigo: </label> 
				<input class="cell" type="text" name="">
			</div>
			<div class="padding1ex grid-x large-10 medium-12">
				<label class="cell small-12 medium-2 large-1 text-right padding1ex">Descripcion: </label> 
				<div class="cell largue-11 medium-10 small-12">
					<textarea></textarea>
				</div>
				
			</div>
			<div class="padding1ex">
				<button class="button success rounded text-white" ng-click="add(); addView=false;">Guardar</button>
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