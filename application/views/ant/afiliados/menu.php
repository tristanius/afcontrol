
	<!-- menu afiliaciones -->


	<div id="menu-afiliado" class="columns boxshadow" style="background: transparent; padding-left: 3ex;">
		<h3 style="text-align:center" class="bg-white">MENU DE GESTIONES</h3>

		<?php if ($this->session->userdata('tipo') != 'Tesorero') {
		?>
			<a href="<?= site_url('afiliado/lista') ?>">
				<div class="btn-gestion float-l wine text-center">
					<h4><i data-icon="s"></i></h4>
					<p>
						<b>Afiliaciones</b>
					</p>
				</div>
			</a>
		<?php
		} ?>


		<?php if ($this->session->userdata('tipo') != 'Gestor de afiliados') {
		?>
			<a href="<?= site_url('mensualidad/lista') ?>">
				<div class="btn-gestion float-l dark-green text-center">
					<h4><i data-icon="p"></i></h4>
					<p>
						<b>Pagos</b>
					</p>
				</div>
			</a>		
		<?php
		} ?>

		<?php if ($this->session->userdata('tipo') == 'Presidente' || $this->session->userdata('tipo') == 'AdminSys') {
		?>
			<a href="<?= site_url('consulta') ?>">
				<div class="btn-gestion float-l blue text-center">
					<h4><i data-icon="&#xe014;"></i></h4>
					<p>
						<b>Informes e Historiales</b>
					</p>
				</div>
			</a>

			<a href="<?= site_url('crud/') ?>">
				<div class="btn-gestion float-l gray text-center">
					<h4><i data-icon="z"></i></h4>
					<p>
						<b>Configuracón</b>
					</p>
				</div>
			</a>
		<?php
		} ?>

		<div></div>
	</div>
	<br>


	<script type="text/javascript">
		$(document).ready(function(){
			$("#menu-afiliado button").on("click",function(){
				var btn = $(this);
				window.location.href = btn.data("link");
			})
		});
	</script>
