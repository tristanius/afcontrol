var form_afiliado = function($scope, $http, $timeout){
	$scope.af = {
		tipo_identificacion: "T.I."
	};

	$scope.initAfiliado = function(id){
		if(id == null){
			$scope.getAfiliado(id);
		}
	}

	$scope.getAfiliado = function(id){
		$http.get($scope.$parent.site_url+'afiliado/get/'+id)
			.then(
				function(response){},
				function(response){}
			);
	}

	$scope.guardar = function(){
		$http.post($scope.$parent.site_url+'afiliado/save', $scope.af )
			.then(
				function(response){
					if(response.data.success){
						$scope.afiliado = response.data.return;
						$scope.saved = true;
						$scope.saved_msj = response.data.msj;
					}else{
						alert('Algo no ha salido bien');
						console.log(response.data);
					}
				},
				function(response){
					alert('Error en el proceso');
					console.log(response.data);
				}
			);
	}

	$scope.insertar = function(){
		$http.post($scope.$parent.site_url+'afiliado/save',{});
	}

	$scope.validar_campos = function(){}
}