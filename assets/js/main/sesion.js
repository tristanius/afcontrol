// -------------------------------------------------------------------------------------------
// Form de afiliado para Add, edit e incluso ver.
var cambiar_password = function($scope, $http, $timeout){
	$scope.respuesta = {msj: "", success: false};

	$scope.cambiar_password = function(lnk, datos){
		$http.post(
				$scope.$parent.site_url,
				datos
			)
			.then(
				function(resp){
					if(resp.data.success){
						$sscope.respuesta = resp.data;						
						datos.password_actual = '';
						datos.password_nueva = '';
						datos.password_nueva_confirmacion = '';
					}
					console.log(resp.data)
				},
				function(resp){
					alert("ha ocurrido un error");
					console.log(resp.data);
				}
			);
	}

}