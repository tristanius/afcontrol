<!DOCTYPE html>
<html>
	<?php $this->load->view('init/head', array('titulo'=>'LogIn') ); ?>
<body>

	<section class="grid-x grid-margin-x">
		<div class="large-3 medium-2"></div>

		<form method="post" action="<?= site_url('sesion/validate') ?>" class="grid-x large-6 medium-8">
 
 			<h4 class="callout small-12 large-12 medium-12cell">Inicio de sesión para AFControl</h4>

			<div class="small-2 medium-4 large-4 cell">

				<img src="<?= base_url('assets/img/icon.png') ?>" style="width:100%;">
				
			</div>

  			<div class="small-10 medium-8 large-8  cell">

  				<p>Por favor llena los siguiente campos para ingresar:</p>

  				<label>
  					<span>Usuario:</span>
  					<input type="text" name="user">
  				</label>
  				
  				<label>
  					<span>Contraseña:</span>
  					<input type="password" name="pass">
  				</label>

  				<p>
					<a href="" class="">Perdi mi password</a href="">
				</p>

  				<div class="button-group">
					<button class="success button" style="color: #FFF; font-weight: bold">Iniciar sesion</button>
				</div>
  			</div>

  			<hr>

  			<div>
  				
  				<ul class="menu">
  					<li class="align-self-middle">AFControl @ YTL</li>
  					<li><a href="">Contacto</a></li>
  					<li><a href="">Twitter</a></li>
  					<li><a href="">Facebook</a></li>
  				</ul>

  			</div>
			
		</form>


		<div class="large-3 medium-2"></div>
		
	</section>

</body>
</html>