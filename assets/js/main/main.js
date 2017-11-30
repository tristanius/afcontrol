var app = angular.module('afcontrol',[]);
app.controller('main', function($scope, $http, $timeout, $templateCache){
	$scope.site_url = undefined;
	$scope.selected_tab = {active:false};
	$scope.tab_counter = 0;
	$scope.tabs = [];
	$scope.filtered_list = [];
	//---------------------------------//
	// Click del menu lateral //
	$scope.clickOpcionMenu = function(link, titulo){
		$scope.addNewTab(link, titulo);
	}
	//---------------------------------//
	// Manejo de pestañas
	$scope.initTabs = function(){
		$scope.tabs.push({ id:0, title:"Inicio", lnk: $scope.site_url+"welcome/entrada", active: true, rm: false });
		$scope.selected_tab = $scope.tabs[0]; // apuntamos al validador de pestaña selecionada
	}
	$scope.selectedTab = function(tab){
		$timeout(function(){
			$scope.selected_tab.active = false; // desmarcamos la pestaña seleccionada
			tab.active = true;
			$scope.selected_tab = tab; // reasignamos la nueva pestaña seleccionada
			$templateCache.removeAll();
		})
	}
	$scope.addNewTab = function(link, titulo){
		var n = $scope.tabs.length;
		$scope.tabs.push({id: (++$scope.tab_counter) , title: titulo, lnk: $scope.site_url+link, active: false, rm: true });
		$scope.selectedTab($scope.tabs[n]); // se auto selecciona la nueva pestaña
		$templateCache.removeAll();
	}
	$scope.closeTab = function(tab){
		var b = confirm('¿Esta seguro de cerrar esta pestaña?');
		if (b) {
			var n = $scope.tabs.length;
			var i = $scope.tabs.indexOf(tab);
			if(tab.active && i!=0){
				$scope.selectedTab($scope.tabs[i-1]);
			}else if(i==0 && n > 1){
				$scope.selectedTab($scope.tabs[i+1]);
			}else{
				$scope.selected_tab = {active:false} // para evitar que quede cargada la view de la ultima pestaña
			}
			$templateCache.removeAll();
			$scope.tabs.splice(i, 1);
		}
	}

	$scope.updateMyActualTab = function(lnk, titulo){
		$scope.selected_tab.link = lnk;
		$scope.selected_tab.titulo = titulo;
	}
	//---------------------------------//
	$scope.viewVentanaModal = function(){}

	$scope.findWordsBy = function(list, field, valField){
		returnList = [];
		angular.forEach(list, function(v,k){
			var myField = v[field].toLowerCase();
			if (myField.includes(valField)) {
				returnList.push(v);
			}
		});
		return returnList;
	}

	$scope.findWords = function(list, fields){
		returnList = [];
		var keys =  Object.keys(fields);
		angular.forEach(list, function(v,k){
			if ( $scope.validFindWords(keys, fields, v) )
				returnList.push(v);
		});
		return returnList;
	}
	$scope.validFindWords = function(keys, filter, comparator){ // medoto necesario para findWords()
		var b = undefined;
		angular.forEach(keys, function(f,i){
			var x = comparator[f].toLowerCase();
			var y = filter[f].toLowerCase();
			if(filter[f] && comparator[f] && ( x.includes( y ) ) ){
				b = true;
			}else{
				b = false;
			}
		});
		return b;
	}
	//---------------------------------//
	$scope.datatable = function(id){
		$timeout(function(){ 
			$(id).DataTable(
				{
			        "language": {
			            "paginate": {
					        "first":      "Primera",
					        "last":       "Ultima",
					        "next":       "Siguiente",
					        "previous":   "Anterior"
					    },
					    "zeroRecords": "Nothing found - sorry",
			            "info": "Mostrando pag. _PAGE_ de _PAGES_",
			            "lengthMenu": "Mostrando _MENU_ filas",
			            "infoEmpty": "Mostrando 0 a 0 de 0 filas",
			            "search": "Buscar:",
			        }
			    }); 
		});
	}

	$scope.datatableObj = function(that){
		console.log(that);
		$timeout(function(){
			$(that).children("table").DataTable(
				{
			        "language": {
			            "paginate": {
					        "first":      "Primera",
					        "last":       "Ultima",
					        "next":       "Siguiente",
					        "previous":   "Anterior"
					    },
					    "zeroRecords": "Nothing found - sorry",
			            "info": "Mostrando pag. _PAGE_ de _PAGES_",
			            "lengthMenu": "Mostrando _MENU_ filas",
			            "infoEmpty": "Mostrando 0 a 0 de 0 filas",
			            "search": "Buscar:",
			        }
			    }				       
			);
		});
	}
	// Gestion de general de forms


	$scope.cleanObj = function(obj){ 
		for (var prop in obj) {
		  obj[prop] = '';
		}
	}

	// datepicker

	$scope.datepicker = function(selector){
		$( selector ).datepicker({
			changeMonth: true,
			changeYear: true
		});
	}

});

app.controller('form_afiliado', function($scope, $http, $timeout, $templateCache){
	form_afiliado( $scope, $http, $timeout );
} );
app.controller('list_afiliados', function($scope, $http, $timeout, $templateCache){
	list_afiliados( $scope, $http, $timeout );
} );

app.directive('myDatatable', function($compile) {
  return function(scope, element, attrs) {
    scope.datatableObj(element);
  };
});