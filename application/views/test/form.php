<div style="background: #FFF;">
	<div class="expanded row" style="border: 1px solid #999; background: #CCC;">
		<div class="columns medium-1"></div>
		<div class="columns medium-11" >
			<h4 style="background: #FFF; padding: 5px;">Titulo de la gestion y ruta</h4>
		</div>
	</div>

	<article class="row">
		<div class="columns medium-2">
			<a class="thumbnail" href="#">
				<img src="<?= base_url('assets/img/leon.png') ?>" alt="foto">
			</a>
		</div>
		<form class="columns medium-10">
			<fieldset class="fieldset">
				<legend>Formulario</legend>
				<div class="row">
					<div class="columns medium-4 padding1ex">
						<label>
							Identificación:
							<input type="text" name="" disabled />
						</label>
					</div>
					<div class="columns medium-4 padding1ex">
						<label>
							Nombres:
							<input type="text" name="" disabled />
						</label>
					</div>

					<div class="columns medium-4 padding1ex">
						<label>
							Apellidos:
							<input type="text" name="" disabled />
						</label>
					</div>
				</div>
				
			</fieldset>
		</form>
		<div class="columns medium-12">
			<div class="pestanas">
				<ul class="menu">
				  <li class="active-tab"><a href="#">Tab 1</a></li>
				  <li><a href="#">Tab 2</a></li>
				  <li><a href="#">Tab 3</a></li>
				</ul>
			</div>
			<div class="pestanasDiv">
				<div class="">
					<h4>Contenido de la pestaña</h4>
					<p>Este es el contenido.</p>
				</div>
				<div class="nodisplay">2</div>
				<div class="nodisplay">3</div>
			</div>
		</div>
	</article>
</div>