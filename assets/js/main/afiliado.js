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
	$scope.afiliados = undefined;
	$scope.listado_afiliados = undefined;
	$scope.list_ini = 0;
	$scope.list_end = 25;
	$scope.filterAfiliado = {};
	$scope.myFilter = {};
	$scope.filterStatus = {timer: new Date(), status: false, process: undefined};
	$scope.showList = false;

	/*$scope.filterChanges = function(){
		if ($scope.filterStatus.status) {
			clearTimeout($scope.filterStatus.process);
		}
		$scope.filterStatus.status = true;
		$scope.filterStatus.process = setTimeout($scope.applyfilter( $scope.myFilter ), 2000);
	}

	$scope.applyfilter = function(filter){
		$scope.showList = false;
		$scope.filterAfiliado =  filter;
		$scope.filterStatus.status = false;
		$scope.showList = true;
	}*/

	$scope.filterTimer = function(list, filtro){
		if ($scope.filterStatus.status) {
			clearTimeout($scope.filterStatus.process);
		}
		$scope.filterStatus.status = true;
		$scope.showList = false;
		$scope.filterStatus.process = setTimeout( function(){ $scope.applyMyFilter( list, filtro ) } , 600);
	}

	$scope.applyMyFilter = function(list, f){
		$timeout(function() {
			$scope.listado_afiliados = $scope.$parent.findWords(list, f);
			$scope.filterStatus.status = false;
			$scope.showList = true;	
		});
	}

	$scope.getListAfiliados = function(ini, end){
		$http.get($scope.$parent.site_url+'afiliado/getList/'+ini+'/'+end)
			.then(
				function(response){
					$scope.showList = true;
					$scope.afiliados = response.data;
					$scope.listado_afiliados = $scope.afiliados;
					console.log(response.data);
				},
				function(response){
					console.log(response.data);
				}
			);
	}
}