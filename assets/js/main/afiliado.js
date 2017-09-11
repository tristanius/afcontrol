// -------------------------------------------------------------------------------------------
// Form de afiliado para Add, edit e incluso ver.
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
		console.log($scope.$parent.site_url+'afiliado/save')
		$http.post($scope.$parent.site_url+'afiliado/save', $scope.af )
			.then(
				function(response){
					if(response.data.success){
						$scope.af = response.data.return;
						$scope.saved = true;
						$scope.saved_msj = response.data.msj;
						$('#saved_msj').toggle('.nodisplay');
						setTimeout(function(){ $('#saved_msj').toggle('.nodisplay'); }, 3000);
					}else{
						alert('Algo no ha salido bien');
					}
					console.log(response.data);
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

	$scope.validar_campos = function(){
		alert('test');
	}
}

// -------------------------------------------------------------------------------------------
// Lista de afiliados
var list_afiliados = function($scope, $http, $timeout){
	$scope.afiliados=[];
}