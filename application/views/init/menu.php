<div id="menu" class="">
	<ul id="menu_lateral" class="vertical menu" data-accordion-menu>
		<li>
			<h4>
				<a>
					<img src="<?= base_url('assets/img/icon.png') ?>" style="width: 2em; display: inline">
					AFControl
				</a>
			</h4>
	    	<!-- Close button -->
	    	<button class="close-button" aria-label="close menu" type="button" data-toggle="offCanvas">
		      	<span aria-hidden="true">&times;</span>
		    </button>
	    </li>
	  	<li>
	    	<a> <i class="fa fa-address-book-o"></i> Afiliados</a>
    		<ul class="menu vertical nested">
      			<li><a class="" ng-click="clickOpcionMenu('afiliado/add','Add afiliado');" data-toggle="offCanvas"> Add. Afiliado</a></li>
      			<li><a class="" ng-click="clickOpcionMenu('afiliado/mylista/','Lista de afiliados')" data-toggle="offCanvas"> Ver mis Afiliados</a></li>
      			<li><a class="" ng-click="clickOpcionMenu('afiliado/lista','Lista de afiliados')" data-toggle="offCanvas"> Lista de Afiliados</a></li>
    		</ul>
	  	</li>
	  	<li>
	  		<a> <i class="fa fa-usd"></i> Pagos</a>
    		<ul class="menu vertical nested">
      			<li><a class="" href="#"> Add. pago</a></li>
      			<li><a class="" href="#"> Ver pagos</a></li>
    		</ul>
	  	</li>
	  	<li>
	  		<a> <i class="fa fa-file-text-o"></i> Consultas</a>
    		<ul class="menu vertical nested">
      			<li><a class="" href="#"> Estados de cuenta</a></li>
      			<li><a class="" href="#"> Afiliados</a></li>
      			<li><a class="" href="#"> Examenes medicos</a></li>
      			<li><a class="" href="#"> Categorias</a></li>
    		</ul>
	  	</li>
	  	<li>
	  		<a> <i class="fa fa-wrench"></i> Agrupaciones</a>
	  		<ul class="menu vertical nested">
      			<li><a class="" ng-click="clickOpcionMenu('categoria/add', 'Categorias')" data-toggle="offCanvas"> Categorias</a></li>
      			<li><a class="" href="#" data-toggle="offCanvas"> Sedes</a></li>
      			<li><a class="" ng-click="clickOpcionMenu('grupo/add', 'Grupos')" data-toggle="offCanvas"> Grupos</a></li>
    		</ul>
	  	</li>
	  	<li>
	  		<a> <i class="fa fa-wrench"></i> Configuración</a>
	  	</li>
	  	<li>
	  		<a> <i class="fa fa-address-card-o"></i> Mis datos</a>
	  		<ul class="menu vertical nested">
	  			<li><a class="" ng-click="clickOpcionMenu('sesion/form_changa_pass','Cambiar contraseña')" data-toggle="offCanvas"> Actualizar datos</a></li>
	  			<li><a class="" ng-click="clickOpcionMenu('sesion/form_changa_pass','Cambiar contraseña')" data-toggle="offCanvas"> Cambiar contraseña</a></li>
	  		</ul>
	  	</li>
	  	<li>
	  		<a href="<?=  site_url('sesion/end') ?>"> 
	  			<i class="fa fa-user-circle"></i> 
	  			Cerrar sesión
	  		</a>
	  	</li>
	</ul>
</div>

<style type="text/css">
	#menu_lateral.vertical.menu > li{
		border-bottom: 1px solid #aaa;
		min-height: 6ex;
	}	
</style>