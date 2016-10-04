	<!-- Login -->
	<section id="login">

		<div class="row medium-5 rounded" style="box-shadow: 0px 0px 5px #777">
			<div class="">
				<h4 class="medium-10 div-center padding1ex" style="text-align:center; text-shadow: 0px 0px 3px #999; "> ALIANZA NORTE F.C. </h4>
				<p class="text-center" style="padding:1px; color:#2199E8">
					<small><b>CONTROL DE AFILIADOS AL CLUB</b></small>
				</p>
			</div>
			<?php
			if(isset($failed)  && $failed == "failed" ){
			?>
				<p class="alert label">
					( ! ) Algo ha fallado, Los datos ingresados no son correctos.
				</p>
			<?php
			}else if(isset($failed)  && $failed == "fail" ){
			?>
				<p class="warning label">
					( ! ) Algo ha fallado, Contraseña incorrecta.
				</p>
			<?php
			}
			?>
			<form class="columns" action="<?= site_url('sesion/validar') ?>" method="post">
				<fieldset class="columns" style="margin:1ex;">
					<legend><h4>Inicio de sesión:</h4></legend>
					<div class="medium-7 columns">
						<label>
							Usuario:
        					<input type="text" name="user" placeholder="Ingrese su Nombre de usuario"/>
      					</label>
					</div>

					<div class="medium-7 columns">
						<label>
							Contraseña:
        					<input type="password" name="pass" placeholder="Ingrese su contraseña" />
      					</label>
					</div>

					<div class="medium-7 ">
						<button class="button float-right"> Validar</button>
					</div>

				</fieldset>
			</form>
		</div>
	</section>

	<br class="clear">
