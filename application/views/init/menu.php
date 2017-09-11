<div id="menu" class="">
	<ul class="vertical menu" data-accordion-menu>
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
      			<li><a class="" ng-click="clickOpcionMenu('afiliado/add','Add afiliado')"> Add. Afiliado</a></li>
      			<li><a class="" ng-click="clickOpcionMenu('afiliado/find','Buscar afiliado')"> buscar Afiliado</a></li>
      			<li><a class="" ng-click="clickOpcionMenu('afiliado/list','Lista de afiliados')"> Lista de Afiliados</a></li>
    		</ul>
	  	</li>
	  	<li>
	  		<a> <i class="fa fa-credit-card"></i> Pagos</a>
    		<ul class="menu vertical nested">
      			<li><a class="" href="#"> Add. pago</a></li>
      			<li><a class="" href="#"> Ver pagos</a></li>
    		</ul>
	  	</li>
	  	<li>
	  		<a> <i class="fa fa-table"></i> Consultas</a>
    		<ul class="menu vertical nested">
      			<li><a class="" href="#"> Estados de cuenta</a></li>
      			<li><a class="" href="#"> Afiliados</a></li>
      			<li><a class="" href="#"> Examenes medicos</a></li>
      			<li><a class="" href="#"> Categorias</a></li>
    		</ul>
	  	</li>
	  	<li>
	  		<a> <i class="fa fa-wrench"></i> Configuración</a>
	  	</li>
	  	<li>
	  		<a href="#"> 
	  			<i class="fa fa-user-circle"></i> 
	  			Cerrar sesión
	  		</a>
	  	</li>
	</ul>
</div>