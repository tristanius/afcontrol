	
					<form action="<?= site_url('sesion/chpassword')?>" method="post" accept-charset="utf-8" class="div-center medium-8">
						<h4>Cambiar contraseña</h4>
						<label>
							Actual contraseña:
							<input type="password" name="actual" required>
						</label>
						<br>

						<label>
							Nueva contraseña:
							<input type="password" name="nueva" required>
						</label>

						<label>
							Digite de nuevo la contraseña
							<input type="password" name="nueva2" required>
						</label>

						<button type="submit" class="success round padding1ex">Cambiar contraseña</button>
					</form>