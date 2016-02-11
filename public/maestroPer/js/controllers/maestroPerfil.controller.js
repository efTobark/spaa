var maestroPerfil = angular.module('maestroPerfil');

maestroPerfil.controller('maestroController', ['$scope','$http','$location',
	function($scope,$http,$location){
		$http.get('/api/v1/usuario')
			.success(function(response){
				$scope.username = response;
			});
		$scope.tab = 1;
		$scope.selecTab = function(tab,route){
			$scope.tab = tab;
			$location.path(route); //cambia la ruta actual
		}
	}
]);

maestroPerfil.controller('perfilController', ['$scope','$http','$location','$timeout',
	function($scope,$http,$location,$timeout){
		$timeout(function(){
			$http.get('/api/v1/todoUsuario')
				.success(function(response){
					$scope.usuario = response;
				});
		},1000);
	}
]);

maestroPerfil.controller('gruposController', ['$scope','$http','$location',
	function($scope,$http,$location){
		$http.get('/api/v1/alumno')
			.success(function(response){
				$scope.username = response;
			});
	}
]);

maestroPerfil.controller('alumnosController', ['$scope','$http','$location','$timeout',
	function($scope,$http,$location,$timeout){

		$timeout(function(){
			$http.get('/api/v1/alumnos')
			.success(function(response){
				$scope.alumnos = response;
			});	
		},1000);

		$scope.cambiarDetalle = function(alumno){
			$scope.alumno = alumno;
		};
	}
]);

maestroPerfil.controller('tareasController', ['$scope','$http','$location', '$timeout',
	function($scope,$http,$location,$timeout){

		$timeout(function(){
			$http.get('/api/v1/tareas')
			.success(function(response){
				$scope.tareas = response;
				$scope.etiquetas = ['Activas', 'Finalizadas'];
				$scope.datos = [4, 1];
			});
		},1000);


		// $http.get('/api/v1/tareas')
		// .success(function(response){
		// 	$scope.tareas = response;
		// 	$scope.etiquetas = ['Activas', 'Finalizadas'];
		// 	$scope.datos = [tareas.activas, tareas.finalizadas];
		// });

		$scope.cambiarTarea = function(tarea){
			$scope.tarea = tarea;
		};
	}
]);

maestroPerfil.controller('clasesController', ['$scope','$http','$location',
	function($scope,$http,$location){
		$http.get('/api/v1/clases')
		.success(function(response){
			$scope.clases = response;
		});

		$scope.cambiarClase = function(clase){
			$scope.alumnos = clase.alumnos;
		};
	}
]);

