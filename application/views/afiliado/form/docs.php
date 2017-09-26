<section class="grid-x">
	<div class="cell padding1ex">		
		<caption><strong style="color: #3E6F9E">Documentos asociados: </strong></caption>

		<button class="button" type="button" data-open="uploadDocumentos"> + </button>

		<div class="reveal" id="uploadDocumentos" data-reveal>
			<button class="close-button" ng-click="closeAndCleanUpload('#uploadDocumentos', null)" type="button">
		    	<span aria-hidden="true">&times;</span>
		  	</button>

			<fieldset>
				<legend>Agregar un nuevo documento:</legend>
				<label id="btn-file" for="file" class="upload-form1 button padding1ex">
					Add. doc
					<input type="file" id="file" class="show-for-sr" onchange="$('.upload-form1').toggleClass('nodisplay');"/>
				</label>
				<div id="upload-confirmation" class="upload-form1 nodisplay">
					<label>
						Clasificacion / Tipo : <input type="text" ng-model="doc.clasificacion"> 
					</label>
					&nbsp;
					<button class="button success padding1ex" 
						ng-click='upload("afiliado/upload_doc/"+af.idafiliado, "file", "#file", "#uploadDocumentos")'>
						<i class="primary" data-icon="&#xe030;"></i> Cargar
					</button>
				</div>
				<img src="<?= base_url('assets/img/loader.gif') ?>" ng-show="uploading">
			</fieldset>
		</div>

		<table class="font11">
			<thead>
				<tr>
					<th>No.</th>
					<th>Clasificación</th>
					<th>Fecha de registro</th>
					<th>Ver/descarga</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="d in af.documentos" ng-if="af.documentos">
					<td ng-bind="d.iddocumento"></td>
					<td ng-bind="d.clasificacion"></td>
					<td ng-bind="d.fecha_registro"></td>
					<td> <a ng-href="{{ '<?= base_url() ?>'+d.ruta+d.documento }}" class="button padding5px">Descarga</a> </td>
					<td> <a ng-click="delDoc(d.iddocumento)" class="button alert padding5px">x</a> </td>
				</tr>
			</tbody>
		</table>
	</div>	
</section>