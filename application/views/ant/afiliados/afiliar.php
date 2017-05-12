
	<section ng-app="afiliado" ng-controller="afiliar" class="div-center medium-11 panel">
		<h3>Agregar afiliacion a un grupo y categoria</h3>
		<div>
			<form>
				<div class="">
					<label for="">Seleccione Categoria:</label>
					<select ng-model="idcategoria" ng-change="buscar()">
						<option value="" selected>Seleccione aqui</option>
						<option ng-repeat="cat in categorias" value ="{{cat.idcategoria}}">{{cat.descripcion}}</option>
					</select>
				</div>

				<div>
					<label>Grupo:{{ categoria.valor_mensual | currency }}</label>
					<select ng-model="grupo">
						<option value="" selected>Seleccione aqui</option>
						<option ng-repeat="gr in grupos2" value="{{gr.idgrupo}}">{{gr.nombre_grupo}}</option>
					</select>
				</div>

				<div class="">
					<label for="">Fecha de afiliacion</label>
					<input type="text" class="datepicker" ng-model="fecha_afiliacion" name="fecha_afiliacion" placeholder="ingrese una fecha">
				</div>

				<button type="button" ng-click="enviar()">Guardar</button>
			</form>
		</div>
	</section>

	<script type="text/javascript">
		var app = angular.module("afiliado",[]);
		app.controller("afiliar",function($http, $scope){
			$scope.categorias =<?= json_encode($categorias->result()) ?>;
			$scope.categoria = undefined;
			$scope.grupos =<?= json_encode($grupos->result()) ?>;
			$scope.idcategoria = "";
			$scope.grupo = "";
			$scope.fecha_afiliacion = '';
			$scope.grupos2 = [];

			$scope.buscar = function(){
				$scope.grupo2 = undefined;
				angular.forEach($scope.grupos, function(value, key) {
					if(value.categoria_idcategoria == $scope.idcategoria){
					  	console.log(value)
					  	$scope.grupos2.push(value);
					}
				});
				angular.forEach($scope.categorias, function(value, key) {
					if(value.idcategoria == $scope.idcategoria){
					  	$scope.categoria=value;
					}
				});
			};

			$scope.enviar = function(){
				var link = '<?= site_url("afiliado/afiliar") ?>';
				$.ajax({
					url: link,
					method: "post",
					data:{
						idcat: $scope.idcategoria,
						idgrupo: $scope.grupo,
						idaf: <?= $id ?>,
						fecha: $scope.fecha_afiliacion
					},
					datatype: "json",
					success:function(data){
						if(data == "success"){
							window.location.href = '<?= site_url("afiliado/ver/".$id) ?>';
						}else if(data =="none"){
							alert("Ya se encuentra activo en este grupo");
						}else{
							console.log(data);
						}
					},
					error: function(msg){
						alert("fallo"+JSON.stringify(msg));
					}
				});
			}

		});
	</script>
