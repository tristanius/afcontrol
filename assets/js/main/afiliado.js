// -------------------------------------------------------------------------------------------
// Form de afiliado para Add, edit e incluso ver.
var form_afiliado = function($scope, $http, $timeout){
	$scope.af = {
		tipo_identificacion: "T.I."
	};
	$scope.active_upload = true;
	$scope.uploading= false;

	$scope.activeUpload = function(){
		$timeout(function(){
			$scope.active_upload = !$scope.active_upload;
		});
	}

	$scope.initAfiliado = function(id){
		if(id && id != null){
			$scope.getAfiliado(id);
		}
	}

	$scope.getAfiliado = function(id){
		$http.get($scope.$parent.site_url+'afiliado/get/'+id)
			.then(
				function(response){
					$scope.af = response.data.return;
					$scope.getContacts(id);
					$scope.getDocumentos(id);
					console.log($scope.af);
				},
				function(response){ alert('Error');console.log(response.data)}
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

	$scope.validarCampos = function(){
		alert('test');
	}

	// Contactos
	$scope.getContacts = function(idaf){
		$http.get($scope.$parent.site_url+'afiliado/get_contacts/'+idaf).then(
				function(response){
					$scope.af.contactos = response.data.return;
				},
				function(response){ alert("Error"); console.log(response.data); }
			);
	}
	$scope.newContact = function(lnk, obj,  idaf){
		$http.post($scope.$parent.site_url+lnk+idaf, obj).then(
				function(response){
					if(response.data.success){
						$scope.af.contactos.push( response.data.return );
						$('#form_contacto').foundation('toggle');
					}
					console.log(response.data);
				},
				function(response){ alert("Error"); console.log(response.data); }
			);
	}
	$scope.delContact= function(idc, idaf){
		$http.post($scope.$parent.site_url+'afiliado/del_contacto/'+idc, {idafiliado: idaf}).then(
				function(response){
					if(response.data.success)
						$scope.af.contactos =  response.data.return;
					console.log(response.data);
				},
				function(response){ alert("Error"); console.log(response.data); }
			);
	}

	// Documentos
	$scope.upload = function(lnk, elem){
		var fd = new FormData();
		var files = $(elem);
		fd.append('file', files[0].files[0]);
		fd.append('idafiliado', $scope.af.idafiliado);
		fd.append('identificacion', $scope.af.identificacion);
		$http({
			method: 'post',
			url: $scope.site_url+lnk,
			data: fd,
			headers: {'Content-Type': undefined},
		}).then(
			function(response) { 
				console.log(response.data);
				if (response.data.success) {
					$scope.af.foto = response.data.return;
					$scope.getDocumentos($scope.af.idafiliado);
				}
				$scope.uploading = false;
				$scope.active_upload = true;
			},
			function(response) { 
				console.log(response.data);
				$scope.uploading = false;
				$scope.active_upload = true;
			}
		);
	}

	$scope.getDocumentos = function(id){
		console.log($scope.$parent.site_url+'afiliado/get_documentos/'+id)
		$http.post($scope.$parent.site_url+'afiliado/get_documentos/'+id, {idafiliado: $scope.af.idafiliado})
			.then(
				function(response){
					if ( response.data.success ) {$scope.af.documentos = response.data.return;}
					console.log(response.data);
				},
				function(response){
					console.log(response.data);
				}
			);
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
		$scope.$parent.datatable("#tabla_afiliado");
	}

	$scope.getListAfiliados = function(ini, end){
		$http.get($scope.$parent.site_url+'afiliado/getList/'+ini+'/'+end)
			.then(
				function(response){
					$scope.showList = true;
					$scope.afiliados = response.data;
					$scope.listado_afiliados = $scope.afiliados;
					$scope.$parent.datatable("#tabla_afiliado");
				},
				function(response){
					console.log(response.data);
				}
			);
	}
}