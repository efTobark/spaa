var maestroPerfil = angular.module('maestroPerfil', []);

maestroPerfil.directive('maestro-perfil',
	function(){
		return{
			restrict: 'E',
			templateUrl: 'maestroPer/html/views/perfil.html'
		}
});

maestroPerfil.directive('maestro-grupos',
	function(){
		return{
			restrict: 'E',
			templateUrl: 'maestroPer/html/views/grupos.html'
		}
});

maestroPerfil.directive('maestro-alumnos',
	function(){
		return{
			restrict: 'E',
			templateUrl: 'maestroPer/html/views/alumnos.html'
		}
});


maestroPerfil.directive('maestro-tareas',
	function(){
		return{
			restrict: 'E',
			templateUrl: 'maestroPer/html/views/tareas.html'
		}
});
