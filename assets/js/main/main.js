var app = angular.module('afcontrol',[]);
app.controller('main', function($scope, $http, $timeout, $templateCache){
	$scope.site_url = undefined;
	$scope.selected_tab = {active:false};
	$scope.tab_counter = 0;
	$scope.tabs = [
		{ id:0, title:"Inicio", lnk:"welcome/entrada", active: true, rm: false }
	]
	//---------------------------------//
	// Visualizacion de menu y cajas
	$scope.toggleClass = function(selector, myclass){
		$(selector).toggleClass(myclass);
	}

	$scope.toggleMenu = function(selector, selector2, myclass){
		$(selector).toggleClass(myclass);
		$(selector2).toggleClass('large-10');
	}
	//---------------------------------//
	// Manejo de pestañas
	$scope.initTabs = function(){
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
		let n = $scope.tabs.length;
		$scope.tabs.push({id: (++$scope.tab_counter) , title: titulo, lnk:link, active: false, rm: true });
		$scope.selectedTab($scope.tabs[n]); // se auto selecciona la nueva pestaña
		$templateCache.removeAll();
	}
	$scope.closeTab = function(tab){
		let b = confirm('¿Esta seguro de cerrar esta pestaña?');
		if (b) {
			let n = $scope.tabs.length;
			let i = $scope.tabs.indexOf(tab);
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

	//---------------------------------//
	// Gestion de general de forms
});