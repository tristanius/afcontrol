<section ng-controller="form_afiliado">
	<fieldset>
		<div class="grid-y">
			<div class="grid-x cell">

				<fieldset class="cell medium-4 large-2">
					<!-- foto del afiliado -->
					<img ng-src="{{ af.foto?af.foto:'<?= base_url('assets/img/icon.png') ?>'; }}" 
						class="thumbnail" 
						alt="Photo of Uranus."
						style="width: 100%;" 
					/>
					<button class="button">Cargar foto</button>
				</fieldset>

				<fieldset class="cell medium-8 large-5">
					<caption><strong style="color: #3E6F9E">Datos personales: </strong></caption>
					<label>
						Identificación: <input type="text" ng-model="af.identificacion" placeholder="No. de identificación">
					</label>
					<label>
						Nombres: <input type="text" ng-model="af.nombre_completo" placeholder="por favor ingrese sus nombres">
					</label>
					<label>
						Apellidos: <input type="text" ng-model="af.apellidos_completos" placeholder="por favor ingrese sus apellidos">
					</label>
				</fieldset>

				<fieldset class="cell medium-8 large-5">
					<caption><strong style="color: #3E6F9E">Datos de contacto: </strong></caption>
					<label>
						Telefono: <input type="text" ng-model="af.identificacion" placeholder="No. de identificación">
					</label>
					<label>
						Movìl: <input type="text" ng-model="af.identificacion" placeholder="No. de identificación">
					</label>
				</fieldset>
			</div>		
		</div>

	</fieldset>
</section>