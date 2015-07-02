   
				var app = angular.module('OVTApp', []);
				
				app.controller('clientCtrl', function($scope,$http,$location,$window) {
						$scope.affectShow=false;
						$scope.loading = false;
						$scope.actionClick= function (idclient) {
							$scope.loading = true;
				   			{% verbatim %} var link=Routing.generate('ovt_back_end_admin_gestion_get_client_by_id', {id:idclient}); {% endverbatim %}
				   			$http.get(link).
						  	success(function(data, status, headers, config) {
							    $scope.selectedClient=data;
							    $scope.loading = false;
						  	}).
						 	error(function(data, status, headers, config) { });
				   		}

				   		$scope.switchAffect = function (){
				   			$scope.affectShow=!($scope.affectShow);
				   		}

				   		$scope.delAdmin= function (idorg,idadmin) {
							$scope.loading = true;
				   			{% verbatim %} var link=Routing.generate('ovt_back_end_admin_gestion_client_deleteadmin', {idOrg:idorg,idAdmin:idadmin}); {% endverbatim %}
				   			$http.get(link).
						  	success(function(data, status, headers, config) {
							    $scope.loading = false;
						  	}).
						 	error(function(data, status, headers, config) { });
				   		}
						$scope.toUpdate= function (idorg) {
							{% verbatim %} var link=Routing.generate('ovt_back_end_admin_gestion_client_update', {idOrg:idorg}); {% endverbatim %}
							$window.location.href=link;
				   		}
				   	});
