<section class="grid-x">
	<fieldset ng-controller="cambiar_password" class="float-center medium-10 small-12 large-7">
		<div class="grid-x">
			<div class="large-4 medium-3 small-2 padding1ex hide-for-small-only">
				<table>
					<thead>
						<tr>
							<th>Usuario</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td ng-bind="sesion.user.usuario"></td>
						</tr>
					</tbody>
					<thead>
						<tr>
							<th>Correo</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td ng-bind="sesion.user.mail"></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="large-8 medium-9 small-10">
				<legend><h4>Cambio de contraseña de usuario</h4></legend>

				<!-- Formulario -->
				<div>
					<label>
						<b>Contraseña actual:</b>
						<input type="password" ng-model="user.password_actual" placeholder="ingresa la contraseña nueva">
					</label>
					<label>
						<b>Nueva contraseña:</b>
						<input type="password" ng-model="user.password_nueva" placeholder="ingresa la contraseña nueva">
					</label>
					<label>
						<b>Confirmar nueva contraseña:</b>
						<input type="password" ng-model="user.password_nueva_confirmacion" placeholder="ingresa la confirmacion">
					</label>

					<div ng-if="user.password_nueva_confirmacion">
						<span ng-if="user.password_nueva != user.password_nueva_confirmacion" style="color:red">Las nuevas contraseñas no coinciden</span>
					</div>

					<input type="hidden" ng-model="user.id" ng-init="user.id = sesion.user.idusuario">
					<input type="hidden" ng-model="user.usuario" ng-init="user.usuario = sesion.user.usuario">
				</div>

				<!-- Respuesta -->
				<div ng-if="respuesta.msj" class="callout {{ respuesta.success? 'success' : 'warning' ; }}"> 
					<span ng-bind="respuesta.msj"></span> 
				</div>

				<div ng-if="user.password_nueva && user.password_nueva_confirmacion" >
					<!-- Boton de confirmacion de cambio de contraseña -->
					<button ng-if="user.password_nueva == user.password_nueva_confirmacion" ng-click="cambiar_password('sesion/change_pass', user)" class="button btn">Cambiar</button>
				</div>
			</div>
		</div>
	</fieldset>
</section>