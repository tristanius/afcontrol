<div id="menu" class="columns large-2 hidden-menu">
	<ul class="vertical menu" data-accordion-menu>
		<li ng-click="toggleMenu('#menu', '#panel-content','hidden-menu')">
			<a href="#" style="background: #000; color: yellow" ><big>Opciones</big></a>
		</li>
	  	<li>
	    	<a href="#"> <i class="fa fa-address-book-o"></i> Afiliados</a>
    		<ul class="menu vertical nested">
      			<li><a class="" ng-click="clickOpcionMenu('afiliado/add','Add afiliado')"> Add. Afiliado</a></li>
      			<li><a class="" ng-click="clickOpcionMenu('afiliado/ver','Add afiliado')"> Ver Afiliado</a></li>
      			<li><a class="" ng-click="clickOpcionMenu('afiliado/lis','Add afiliado')"> Listar Afiliado</a></li>
    		</ul>
	  	</li>
	  	<li>
	  		<a href="#"> <i class="fa fa-credit-card"></i> Pagos</a>
    		<ul class="menu vertical nested">
      			<li><a class="" href="#"> Add. pago</a></li>
      			<li><a class="" href="#"> Ver pagos</a></li>
    		</ul>
	  	</li>
	  	<li>
	  		<a href="#"> <i class="fa fa-table"></i> Consultas</a>
    		<ul class="menu vertical nested">
      			<li><a class="" href="#"> Estados de cuenta</a></li>
      			<li><a class="" href="#"> Afiliados</a></li>
      			<li><a class="" href="#"> Examenes medicos</a></li>
      			<li><a class="" href="#"> Categorias</a></li>
    		</ul>
	  	</li>
	  	<li>
	  		<a href="#"> <i class="fa fa-wrench"></i> Configuración</a>
	  	</li>
	  	<li>
	  		<a href="#"> 
	  			<i class="fa fa-user-circle"></i> 
	  			Sesión
	  		</a>
	  	</li>
	</ul>
</div>