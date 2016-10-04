
	<!-- nav -->
	<nav id="navegacion" class="top-bar" data-topbar role="navigation">

	  <ul class="title-area">
	    <li class="name">
	      <h1><a href="#"><img src="<?= base_url('assets/img/logo.png') ?>" style="width:5ex"></a></h1>
	    </li>
	     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
	    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
	  </ul>

	  <section class="top-bar-section">
	    <!-- Right Nav Section -->
	    <ul class="right" id="naver" >
		    <li class="has-dropdown">
		        <a href="#">Opciones</a>
		        <ul class="dropdown" style="z-index:1000">
		        	<?php if ($this->session->userdata('tipo') != 'Tesorero') {?>
			        <li><a href="<?= site_url('afiliado/lista') ?>">Manejo de afiliados</a></li>
			        <?php } ?>

			        <?php if ($this->session->userdata('tipo') != 'Gestor de afiliados'){ ?>
			        <li class="active"><a href="<?= site_url('consulta') ?>">Consultas</a></li>
			        <?php } ?>

			        <?php if ($this->session->userdata('tipo') == 'Presidente' || $this->session->userdata('tipo') == 'AdminSys') {?>
			        <li class="active"><a href="<?= site_url('mensualidad/lista') ?>">Pagos de mensualidd</a></li>
			        <li class="active"><a href="<?= site_url('crud') ?>">Config.</a></li>
			        <?php } ?>
			        
			        <li class="active"><a href="<?= site_url('sesion/logout') ?>">Cerrar Sesión</a></li>
		        </ul>
		    </li>
	    </ul>

	    <!-- Left Nav Section -->
	    <ul class="left">
	      <li><a href="<?= site_url('sesion/account') ?>">Mi cuenta</a></li>
	    </ul>

	  </section>

	</nav>
