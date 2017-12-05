<!DOCTYPE html>
<html>
	<?php $this->load->view('init/head', array('titulo'=>'LogIn') ); ?>
<body style="background: url('<?= base_url('assets/img/footer.png') ?>')">

  <nav>
    <div class="top-bar" style="background: #333; color: #FFF">
      <div class="top-bar-left">
        <ul class="dropdown menu" data-dropdown-menu style="background: #333; color: #FFF">
          <li class="hide-for-small-only"> <img src="<?= base_url('assets/img/icon.png') ?>" style="width:30px;"> </li>
          <li class="hide-for-small-only menu-text">Aplicacion de afiliaciones y control de membresias</li>
          <li class="show-for-small-only">Control de afiliados</li>
        </ul>
      </div>
      <div class="top-bar-right">
        <li><a href="" class="button padding1ex">Portal</a></li>
      </div>
    </div>
  </nav>

	<section class="grid-x" >

    <div class="grid-x large-6 medium-8 float-center">

      <form method="post" action="<?= site_url('sesion/validate') ?>" class="grid-x large-12 small-12 medium-12 callout shadow bordered ">
   
        <h4 class="callout small-12 large-12 medium-12 cell">Inicio de sesión para AFControl_site</h4>

        <?php if (isset($status) && $status=='failed'): ?>
          <p class="callout alert small-12 large-12 medium-12">Por favor, verifica tus datos. Usuario o Contraseña Incorrectos.</p>
        <?php endif ?>

        <div class="small-2 medium-4 large-4 cell">

          <img src="<?= base_url('assets/img/icon.png') ?>" style="width:100%;">
          
        </div>

          <div class="small-10 medium-8 large-8 cell">

            
            <p>Por favor llena los siguiente campos para ingresar:</p>

            <label>
              <strong>Usuario:</strong>
              <input type="text" name="user" placeholder="ingresa tu nombre de usuario">
            </label>
            
            <label>
              <strong>Contraseña:</strong>
              <input type="password" name="pass" placeholder="ingresa tu contraseña de acceso">
            </label>
            <p>
              <a href="" class="">Perdi mi password</a href="">
            </p>

            <div class="button-group">
              <button class="success button" style="color: #FFF; font-weight: bold">Iniciar sesion</button>
              <a href="#" class="button" style="color: #FFF; font-weight: bold">Registro</a>
            </div>
          </div>
      </form>

      <div class="callout large-12 medium-12 small-12 bordered shadow">
        
        <ul class="menu">
          <li class="align-self-middle">AFControl_site</li>
          <li><a href="">Contacto</a></li>
          <li><a href="">Twitter</a></li>
          <li><a href="">Facebook</a></li>
        </ul>

      </div>

      <footer class="callout large-12 small-12 medium-12 bordered shadow" style="background: #333; color: #FFF">
          
          <p class="text-center">AFControl es una aplicación para el manejo de afiliaciones y control de membresias.</p>
          <p class="text-center"><small>Creado por Yeison Torrado López.</small></p>

          <div class="text-center"><small>Derechos reservados. <?= date('Y') ?></small></div>

      </footer>
    </div>
		
	</section>

</body>
</html>