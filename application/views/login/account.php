
	<!-- cuenta -->

	<style type="text/css">
		#gestiones{
			margin: 2ex;
			box-shadow: 0px 0px 3px #333;
		}
	</style>

	<div class="colummns">
		<fieldset id="gestiones" class="medium-10" style="background: #FFF; margin:0 auto">
			<div class="text-center">
				<h4 class="text-red medium-10 div-center padding1ex "> CLUB DEPORTIVO: ALIANZA NORTE F.C. </h4>
				<p class="text-center" style="padding:2px; border:1px solid #2199E8; color:#2199E8">Control de afiliación y pagos</p>
			</div>
			<hr>
			<div class="text-center">
				<h4 class="text-center">Gestion de afiliaciones:</h4>
				<div class="panel" style="padding:1ex;">
					<a href="<?= site_url('afiliado/manejos') ?>" class="padding1ex button">Click para ingresar a gestiones</a>
					<p>Gestión de afiliaciones, pagos, informes y reportes</p>
				</div>
			</div>

			<hr>

			<div class="medium-6 column panel text-center">
				<h4>Mi cuenta:</h4>
				<div class="botones">
					<button id="btn-pass" type="button" class="button padding1ex">Cambiar Contraseña</button>

				</div>

				<div id="contraseña">
					<?php
					if (isset($err) && $err=="error") {
						echo "<big class='label alert'>Error en los datos digitados, intenta de nuevo.</big>";
					}else if(isset($err) && $err =="success"){
						echo "<big class='label success'>Cambios realizados con exito.</big>";
					}
					?>
				</div>

				<div id="correo">

				</div>
			</div>


			
			<div class="medium-6 column panel text-center">
				<h4>Sesión:</h4>
				<a href="<?= site_url('sesion/logout') ?>" class="button warning padding1ex" title="">Cerrar sesión</a>
			</div>

		</fieldset>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#btn-pass").on("click", function(){
				$("#contraseña").load("<?= site_url('sesion/change_pass') ?>");
			})
		});
	</script>
