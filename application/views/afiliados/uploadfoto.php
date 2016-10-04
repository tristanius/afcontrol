	
	<!-- -->
	<section class="div-center medium-10 panel ofhidden">
		
		<a href="<?= site_url('afiliado/lista') ?>" class="button warning redondo padding1ex" data-icon="W"></a>
		
		<div class="text-center columns">
			<?php
			if (isset($err)) {
				?>
				<p class="label warning"><?= $err ?></p>
				<?php
			}
			?>
			<form action="" method="POST" class="large-12 column">
				
				<div><h3 class="indicador">Paso No.2: Subir una foto</h3></div>
				<p>Para agregar una categoria un grupo de afiliacion especifico a esta persona debes terminar esta gestion e ir a su perfil y relacionarlo.</p>

				<fieldset class="bg-white">
					<legend><h5>Paso final de registo de nuevo afilado:</h5></legend>
					<br>
					<div class="text-normal">
						<label>Agrege una foto que desee subir a este usuario:</label>
						<div id="uploader">Click para agregar</div>
					</div>

					<br>

					<button id="btn-up" type="button" class="round">Subir y ver perfil</button>
				</fieldset>
			</form>

			<div id="response"></div>

		</div>
	</section>

	<script type="text/javascript">
		var id = "<?= $idp ?>";
		$(document).ready(function(){
			var up = $("#uploader").uploadFile({
				url:"<?= site_url('afiliado/addimg') ?>",
				fileName:"file",
				autoSubmit:false,
				dynamicFormData: function(){
					return { idafiliado: id}
				},
				onSuccess: function(files,data,xhr,pd){
					console.log(data);
					//$("#response").append("<img src='<?= base_url('uploads/img') ?>/"+data+"' width='200'>");
					window.location.href = "<?= site_url('afiliado/ver/'.$idp) ?>"
				},
				onError: function(files,status,errMsg,pd){
					alert(JSON.stringify(status));
				}
			});	
			$("#btn-up").on("click",function(){
				up.startUpload();
			})
		});
	</script>