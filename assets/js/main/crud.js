var crud = function($scope, $http, $timeout){

	$scope.listaCrud = [];
	$scope.listaConsulta = { star:0, end:100, lista:[] };
	$scope.target = undefined;

	$scope.getListadoGeneral = function(lnk){
		$http.post(
				$scope.$parent.site_url+lnk,
				{}
			).then(
				function(resp){
					if(resp.data.success){
						$scope.listaCrud = resp.data.results;
					}else{
						alert("La consulta no ha sido exitosa.");
						console.log(resp.data)
					}
				},
				function(resp){
					alert("Ha ocurrido un error.");
					console.log(resp.data);
				}
			);
	}

	$scope.generarPaginas = function( start, end, lista ){
		$scope.listaConsulta.start = start;
		$scope.listaConsulta.end = end;
		if( lista ){			
			$scope.listaConsulta.lista = lista;
		}
	}

	$scope.filtrar = function(lista, llave, valor){
		$scope.listaConsulta = $scope.$parent.findWordsBy( lista, llave, valor );
	}

	$scope.add = function( lnk, model ){
		$http.post(
				$scope.$parent.site_url+lnk,
				model
			).then(
				function(resp){
					if(resp.data.success){
						model = resp.data.results;
					}else{
						alert("Ha ocurrido un error inesperado");
					}
					console.log(resp.data);
				},
				function(resp){
					alert("Ha ocurrido un error inesperado");
					console.log(resp.data);
				}
			);
	}

	$scope.get = function( lnk, id ){
	}

	$scope.edit = function( lnk, id, data ){
	}

	$scope.del = function( lnk, id ){
	}
}