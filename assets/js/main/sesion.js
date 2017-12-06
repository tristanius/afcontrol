// -------------------------------------------------------------------------------------------
// Form de afiliado para Add, edit e incluso ver.
var cambiar_password = function($scope, $http, $timeout){
	$scope.respuesta = {msj: "", success: false};
	$scope.user = {};

	$scope.cambiar_password = function(lnk, datos){
		$http.post(
				$scope.$parent.site_url+lnk,
				datos
			)
			.then(
				function(resp){
					if(resp.data.success){
						$scope.respuesta = resp.data;
						$scope.$parent.cleanObj(datos);
					}else{
						$scope.respuesta.success = false;
						$scope.respuesta.msj = resp.data.msj;
					}
					console.log(resp.data);
				},
				function(resp){
					alert("ha ocurrido un error");
					console.log(resp.data);
				}
			);
	}

}