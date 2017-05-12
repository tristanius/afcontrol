	<script src='<?= base_url('assets/js/pdfmake/build/pdfmake.min.js') ?>'></script>
	<script src='<?= base_url('assets/js/pdfmake/build/vfs_fonts.js')?>'></script>

	<section ng-app="pagos" ng-controller="add" class="medium-11 div-center panel">
		<!-- <a href="<?= site_url('afiliado/ver/'.$per->idafiliado) ?>" class="button redondo padding1ex" data-icon="W"> </a> -->
		<button type="button" class="button redondo padding1ex" data-icon="W" onclick="window.history.back()"></button><small>Retroceder</small>
		&nbsp; &nbsp; &nbsp; &nbsp;
		<a href="<?= site_url('afiliado/ver/'.$per->idafiliado) ?>" class="button redondo padding1ex warning" data-icon=","></a>

		<div class="columns">
			<h3>Información de afiliado:</h3>
			<div class="column medium-5">

				Nombre completo: {{afiliado.nombres+" "+afiliado.apellidos}}
			</div>
			<div class="column medium-5">
				Grupo: {{afiliado.nombre_grupo}}
			</div>
			<div class="column medium-5">
				Telefono: {{afiliado.telefono}}
			</div>
			<div class="column medium-5">
				Estado de afiliacion: {{afiliado.estado}}
			</div>
			<hr>
			<div class="column medium-7">
				<b>Fecha de afiliación:</b> {{afiliado.fecha_inicio}}
			</div>

			<div></div>
		</div>
		<hr>
		<div>
			<label>Año :</label>
			<select class="medium-4" id="search" ng-model="search" ng-change="checkMeses()">
				<option ng-repeat="y in years" value="{{y.year}}">{{y.year}}</option>
			</select>

			<div class="ofhidden">
				<div class="floatleft" ng-repeat="mes in meses">
					<div ng-if="!mes.status" class="box bg-gray" ng-click="addpagos(mes)"> <span ng-if="mes.selec" data-icon="k"></span> {{ mes.nombre }} </div>
					<div ng-if="mes.status" class="box bg-success"> <span ng-if="mes.selec" data-icon="k"></span> {{ mes.nombre }} </div>
				</div>
			</div>
		</div>
		<div>
			<h4>Lista de meses seleccionados por pagar:</h4>
			<ul>
				<li ng-repeat="i in pagar"> {{ "Mes: "+i.id+" de "+i.year+" ("+i.nombre+")" }} </li>
			</ul>


			<div class=" medium-7">
				<b>Valor mes:</b> <input style="display:inline; width:auto" type="text" ng-model="mensualidad"> {{mensualidad | currency}}
			</div>

			<div ng-if="pagar.length > 0">
				<b>Observaciones de la factura:</b>
				<textarea id="obser" style="min-height:100px"></textarea>
			</div>

			<button class="button" ng-if="pagar.length > 0" ng-click="sendPago()">registrar pagos</button>
		</div>
		<hr>
	</section>

	<style type="text/css">
		.box{
			width: 80px;
			height: 80px;
			float: left;
			margin: 1px;
			color:#000;
			font-size: 10px;
			text-align: center;
			padding-top: 1ex;
			cursor: pointer;
		}
		.bg-success{
			background: #5FED40;
		}
		.bg-primary{
			background: #5084C4;
		}
		.bg-gray{
			background: #DDD;
		}
	</style>

	<script>
		var app = angular.module("pagos",[]);
		app.controller("add",function($scope,$http){
			$scope.mensualidad = undefined;
			$scope.search = "<?= date("Y") ?>";
			$scope.afiliado = <?= json_encode($per) ?>;
			$scope.pagos = <?= $data ?>;
			$scope.yingreso = <?= date("Y",strtotime($fecha_af) ) ?>;
			$scope.mingreso = <?= date("m",strtotime($fecha_af) ) ?>;
			$scope.years = [];
			$scope.meses = undefined;
			$scope.pagar = [];

			$scope.idrecibo = '';
			$scope.valor_total = 0;

			$scope.resetMeses = function(){
				return  [
					{id:1, mes:1, status:false, nombre:"Enero", selec:false},
					{id:2, mes:2, status:false, nombre:"Febrero", selec:false},
					{id:3, mes:3, status:false, nombre:"Marzo", selec:false},
					{id:4, mes:4, status:false, nombre:"Abril", selec:false},
					{id:5, mes:5, status:false, nombre:"Mayo", selec:false},
					{id:6, mes:6, status:false, nombre:"Junio", selec:false},
					{id:7, mes:7, status:false, nombre:"Julio", selec:false},
					{id:8, mes:8, status:false, nombre:"Agosto", selec:false},
					{id:9, mes:9, status:false, nombre:"Septiembre", selec:false},
					{id:10, mes:10, status:false, nombre:"Octubre", selec:false},
					{id:11, mes:11, status:false, nombre:"Noviembre", selec:false},
					{id:12, mes:12, status:false, nombre:"Diciembre", selec:false}
				]
			}
			//necesaria para validar los meses de un año pagos
			$scope.checkFechaingreso = function(coleccion, comparador){
				var veces = 0;
				var ind = coleccion.meses.length;
				var longitud = coleccion.meses.length;
				while(veces < ind){
					if(coleccion.meses[0].id < comparador){
						coleccion.meses.splice(0,1);
					}
					veces++;
				}
			}
			$scope.meses = $scope.resetMeses();
			// genera años con meses
			$scope.checkYears = function(){
				for (var i = $scope.yingreso; i<= <?= date('Y'); ?> ;i++) {
					var mss = $scope.resetMeses();
					$scope.years.push({ year:i, meses:mss});
					if(i == $scope.yingreso){
						var row = $scope.years.slice($scope.years.indexOf(i));
						$scope.checkFechaingreso( row[0], $scope.mingreso );
					}
				}
			};
			$scope.checkYears();

			//aqui se valida la cantidad real de meses pagos
			$scope.checkMeses = function(){
				for (var i = 0; i < $scope.years.length; i++) {
					if($scope.years[i].year == $scope.search){
						//console.log($scope.years[i].meses);
						$scope.meses =  $scope.years[i].meses;
					}
				};
			}
			$scope.checkMeses();

			//Aqui verificamos los pagos
			$scope.checkPagos = function(){
				//ciclo foreach recorriendo los pagos
				angular.forEach($scope.pagos, function(value, key){
					//ciclo for recorriendo los elementos de un año
					for(var i=0; i <= $scope.years.length-1; i++){
						if($scope.years[i].year == value.year){
							var index = value.mes-1;
							if (value.year == $scope.yingreso) {
								var index = value.mes-$scope.mingreso;
							}
							$scope.years[i].meses[index].status = true;
						}
					}
				});
			}
			$scope.checkPagos();

			// funcion de agregar a pagos
			$scope.addpagos = function(item){
				var year =  $scope.search;
				item.year = $scope.search;
				var i = $scope.pagar.indexOf(item);
				if (i >= 0) {
					$scope.pagar.splice(i,1);
				};

				if(item.selec){
					item.selec = false;
				}
				else{
					item.selec = true;
					$scope.pagar.push(item);
				}
			}


			//Aqui validamos los nuevos pagos
			$scope.revalidarPagos = function(){
				angular.forEach($scope.pagar, function(value, key){
					for(var i=0; i <= $scope.years.length-1; i++){
						if($scope.years[i].year == value.year){
							var index = value.id-1;
							if (value.year == $scope.yingreso) {
								var index = value.id-$scope.mingreso;
							}
							$scope.years[i].meses[index].status = true;
							$scope.years[i].meses[index].selec = false;
						}
					}
				});
			}

			$scope.sendPago = function(){
				if($scope.mensualidad == undefined || $scope.mensualidad == ''){
					alert("No se ha especificado mensualidad");
				}else{
					var arr = {
						data : $scope.pagar,
						idafiliacion: $scope.afiliado.idafiliado_grupo,
						observacion: $("#obser").val(),
						idusuario: <?=  $this->session->userdata('idusuario') ?>,
						valor_mes: $scope.mensualidad
					}
					$.ajax({
						url:"<?= site_url('mensualidad/genPago') ?>",
						method:"post",
						data: arr,
						success: function(msj){
							var success = JSON.parse(msj);
							if(success.success == 1){
								$scope.idrecibo = success.idrecibo;
								$scope.valor_total = success.valor_total;
								$scope.generarRecibo();
								$scope.revalidarPagos();
							}
						},
						error: function(msj){
							alert(JSON.stringify(msj))
						}

					});
				}
			}


			// Aqui se hace un proceso pesado
			$scope.generarRecibo = function(){
				$.ajax({
					url:'<?= site_url('mensualidad/genRecibo'); ?>',
					data:{
						afiliacion: $scope.afiliado.idafiliado_grupo,
						idafiliado: $scope.idafiliado,
						data: JSON.stringify($scope.pagar),
						valor_mes: $scope.mensualidad
					},
					method:"post",
					success: function(msj){
						var dd = {
							pageSize: 'letter',
							pageOrientation: 'portrait',
							content: [
								{
							        image: '<?= 'data: '.mime_content_type('./assets/img/escudo.png').' ;base64, '.base64_encode( file_get_contents('./assets/img/escudo.png') )  ?>',
							        width: 60
								},
								{ text:'CLUB DEPORTIVO ALIANZA NORTE FC', alignment: 'center',  fontSize: 14},
								{ text:' ',  fontSize: 10},
								{ text:'RECIBO DE PAGO: No. '+$scope.idrecibo,  fontSize: 10},
								{ text:'AFILIADO A LA ESCUELA: '+$scope.afiliado.nombres+" "+$scope.afiliado.apellidos+"    Identificacion: "+$scope.afiliado.identificacion,  fontSize: 11},
								{ text:'Grupo afiliado: '+$scope.afiliado.nombre_grupo+"   "+'Categoria del grupo: '+$scope.afiliado.descripcion+"  Tipo de registro: "+$scope.afiliado.tipo_registro, fontSize:11},
								{ text:' '},
								{
									style: 'tableExample',
									table: {
										headerRows: 1,
										widths: [200, 150, "*", '*', '*'],
										body: [
											[{text:"CONCEPTO",  style: 'tableHeader'}, {text:"MES CANCELADO", style:"tableHeader"},{text:"AÑO", style:"tableHeader"},{text:"VALOR",style:"tableHeader"}]
										]

									}
								},
								{ text: "Observaciones: "+$("#obser").val() },
								{ text:' ',  fontSize: 10},
								{ text:'__________________________________',  fontSize: 10},
								{ text:'Firma de recibido',  fontSize: 10},
								{ text:"recibo generado el <?= date('d/m/Y') ?>"}
							],
							styles: {
								tableExample: {
									margin: [0, 5, 0, 15]
								},
								tableHeader: {
									bold: true,
									fontSize: 11,
									color: 'black'
								}
							}
						}
						for (var i = 0; i < $scope.pagar.length; i++) {
							dd.content[7].table.body.push(["Pago de mensualidad", $scope.pagar[i].nombre, $scope.pagar[i].year, "$ "+$scope.mensualidad]);
						};
						dd.content[7].table.body.push(["", "", "TOTAL", "$ "+$scope.valor_total]);
						//pdfMake.createPdf(dd).open();
						pdfMake.createPdf(dd).download('<?= $per->identificacion."-".$per->nombres."-".date("Y-m-d") ?>.pdf');
						window.location.href = "<?= current_url() ?>";
					},
					error: function(msj){
						alert(JSON.stringify(msj));
					}
				});
			}
		});
	</script>
