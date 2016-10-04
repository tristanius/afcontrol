	<section class="div-center medium-11 panel ofhidden">
		
		<a href="<?= site_url('afiliado/lista') ?>" class="button warning redondo padding1ex" data-icon="W"></a>
		
		<div class="text-center columns">
			<?php
			if (isset($err)) {
				?>
				<p class="label warning"><?= $err ?></p>
				<?php
			}
			?>
			<form action="<?= site_url('afiliado/update/') ?>" method="POST" class="large-12 column">
				
				<div><h3 class="indicador">Paso No.1: ingresar datos</h3></div>

				<fieldset class="bg-white">
					<legend><h5>Fomulario de registro de un nuevo afilado:</h5></legend>
					<p>Al finalizar de llenar este formulario podras agregar una foto de el nuevo afiliado.</p>

					<input value="<?= $per->idafiliado ?>" type="hidden" name="id">

					<div class="text-normal">
						<input value="<?= $per->idafiliado ?>" name="idafiliado" type="hidden"/>
						<div class="medium-5 column">
							<label>Identificacion:</label>
							<input value="<?= $per->identificacion ?>" type="text" name="identificacion" placeholder="No. de identidad aqui"  style="color:red">
						</div>

						<div class="medium-5 column">
							<label>Tipo identificación:</label>
							<select name="tipo_identificacion">
								<option value="T.I." <?= $per->tipo_identificacion =="T.I."?"selected":""; ?>>T.I. Tarjeta de identidad</option>
								<option value="C.C." <?= $per->tipo_identificacion =="C.C."?"selected":""; ?> >C.C: Cedula</option>
								<option value="Registro Civil" <?= $per->tipo_identificacion =="Registro Civil"?"selected":""; ?> >Registro civíl</option>
							</select>
						</div>

						<div class="medium-5 column">
							<label>Nombres:</label>
							<input value="<?= $per->nombres ?>" type="text" name="nombres" placeholder="Ingrese sus nombres" required>
						</div>

						<div class="medium-5 column">
							<label>Apellidos:</label>
							<input value="<?= $per->apellidos ?>" type="text" name="apellidos" placeholder="Ingrese sus apellidos" required>
						</div>

						<div class="medium-5 column">
							<label>fecha nacimiento:</label>
							<input value="<?= $per->fecha_nacimiento ?>" type="text" class="datepicker" name="fecha_nacimiento" placeholder="ingrese una fecha">
						</div>

						<div class="medium-5 column">
							<label>Telefono</label>
							<input value="<?= $per->telefono ?>" type="text" name="telefono" placeholder="digite su telefono" required>
						</div>

						<div class="medium-5 column">
							<label>Correo</label>
							<input value="<?= $per->correo ?>" type="text" name="correo" placeholder="Ej: micorreo@sitio.com">
						</div>

						<div class="medium-5 column">
							<label>Direccion</label>
							<input value="<?= $per->direccion ?>" type="text" name="direccion" placeholder="Ingrewse aqui la dirección de residencia">
						</div>

						<div class="medium-5 column">
							<label>Tipo de sangre</label>
							<input value="<?= $per->tipo_sanguineo ?>" type="text" name="tipo_sangre" placeholder="EJ: A+">
						</div>

						<div class="medium-5 column">
							<label>Entidad de salud</label>
							<input value="<?= $per->entidad_salud ?>" type="text" name="entidad_salud" placeholder="Ingrese la empresa de salud que tiene">
						</div>
						<div class="medium-5 column">
							<label>Talla:</label>
							<input value="<?= $per->talla ?>" type="text" name="talla" placeholder="Ingrese la empresa de salud que tiene">
						</div>

						<div class="medium-5 column">
							<label>Tipo registro</label>
							<select name="tipo_registro">
								<option value="Deportista">Deportista</option>
								<option value="Contribuyente">Contribuyente</option>
								<option value="Servicio de formacion deportiva">Servicio de formacion deportiva</option>
							</select>
						</div>

						<br>

						<div class="medium-5 column">
							<label>Nombre de Madre</label>
							<input value="<?= $per->nombre_familiar1 ?>" type="text" name="nombre_familiar1" placeholder="Nombre de la madre">
						</div>

						<div class="medium-5 column">
							<label>Nombre de Padre</label>
							<input value="<?= $per->nombre_familiar2 ?>" type="text" name="nombre_familiar2" placeholder="Nombre del padre">
						</div>

						<p></p>
					</div>					

					<div class="medium-5 column">
						<button>Guardar y continuar</button>
					</div>
				</fieldset>
			</form>
		</div>
	</section>