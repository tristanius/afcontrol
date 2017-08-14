var app = angular.module('afcontrol',[]);
app.controller('main', function($scope, $http, $timeout){

	$scope.panel_link = '';
	$scope.site_url = undefined;
	$scope.selected_tab = undefined;
	$scope.tabs = [
		{ id:0, title:"Inicio", lnk:"welcome/entrada", active: true,  },
		{ id:1, title:"Inicio 2", lnk:"welcome/friends", active: false,  }
	]

	$scope.toggleClass = function(selector, myclass){
		$(selector).toggleClass(myclass);
	}

	$scope.toggleMenu = function(selector, selector2, myclass){
		$(selector).toggleClass(myclass);
		$(selector2).toggleClass('large-10');
	}

	// Manejo de pestañas
	$scope.initTabs = function(){
		$scope.selected_tab = $scope.tabs[0];
	}
	$scope.addNewTab = function(link, titulo){
		let n = $scope.tabs.length;
		$scope.tabs.push({id:n, title: titulo, lnk:link, active: false });
		$scope.selectedTab($scope.tabs[n-1]); // se auto selecciona
	}
	$scope.selectedTab = function(tab){
		$timeout(function(){
			$scope.selected_tab.active = false;
			tab.active = true;
			$scope.selected_tab = tab;
		})
	}

	$scope.setNewPanelLink = function(link){
		let m = confirm("¿Esta seguro que desea salir de la sección actual?");
		if(m){
			$scope.panel_link = link;
		}
	}
});