<section class="grid-x">
	<fieldset ng-controller="cambiar_password" class="float-center medium-10 small-12 large-5">
		<br>
		<legend><h4>Cambio de contraseña de usuario</h4></legend>

		<p class="callout">Asegurate de poder recordar tu contraseña, el proceso de  restauración requiere de validaciones adicionales.</p class="callout">

		<div>
			<label>
				Contraseña actual:
				<input type="password" ng-model="user.password_actual" placeholder="ingresa la contraseña nueva">
			</label>
			<br>
			<label>
				Nueva contraseña:
				<input type="password" ng-model="user.password_nueva" placeholder="ingresa la contraseña nueva">
			</label>
			<label>
				Confirmar nueva contraseña:
				<input type="password" ng-model="user.password_nueva_confirmacion" placeholder="ingresa la confirmacion">
			</label>

			<div ng-if="user.password_nueva_confirmacion">
				<span ng-if="user.password_nueva != user.password_nueva_confirmacion" style="color:red">Las nuevas contraseñas no coinciden</span>
			</div>

			<input type="hidden" ng-model="user.id" ng-init="user.id = sesion.user.idusuario">
			<input type="hidden" ng-model="user.usuario" ng-init="user.usuario = sesion.user.usuario">
		</div>

		{{ user | json }}

		<div ng-if="respuesta.msj" class="callout {{ respuesta.success? 'success' : 'warning' ; }}"> 
			<span ng-model="respuesta.msj"></span> 
		</div>

		<div ng-if="user.password_nueva && user.password_nueva_confirmacion" >
			<!-- Boton de confirmacion de cambio de contraseña -->
			<button ng-if="user.password_nueva == user.password_nueva_confirmacion" ng-click="cambiar_password('sesion/change_pass', user)" class="button btn">Cambiar</button>
		</div>

		<br>
		<br>
	</fieldset>
</section>