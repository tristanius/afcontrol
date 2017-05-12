	<!-- Login -->
	<section id="login">

		<div class="row medium-7 rounded" style="box-shadow: 0px 0px 5px #777">
			<div class="">
				<h5 class="medium-10 div-center padding1ex" style="text-align:center; text-shadow: 0px 0px 3px #999;color:red"> CLUB DEPORTIVO ALIANZA NORTE F.C. </h5>
				<p class="text-center" style="padding:1px; color:#2199E8">

<b >CONTROL DE AFILIADOS AL CLUB</b>			</p>
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
					

<div class="medium-6 columns">
<div class="medium-12 columns">
						
<label>
	Usuario:
        					
<input type="text" name="user" placeholder="Ingrese su Nombre de usuario"/>
      					</label>
					
</div>

					
<div class="medium-12 columns">
						
<label>
	Contraseña:
        					
<input type="password" name="pass" placeholder="Ingrese su contraseña" />
      					</label>
					
</div>

					
<div class="medium-12 ">
						
<button class="button float-right"> Validar</button>
					
</div>
</div>

<div class="medium-6 columns">
<img src="<?= base_url('assets/img/escudo.png') ?>" style="width:130px;">


				
</div>

</fieldset>
			
</form>
		</div>
	</section>

	<br class="clear">
