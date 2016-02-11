var maestroPerfil = angular.module('maestroPerfil');

maestroPerfil.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
      when('/perfil', {
        templateUrl: '/maestroPer/html/views/perfil.html',
        controller: 'perfilController'
      }).
      when('/clases', {
        templateUrl: '/maestroPer/html/views/clases.html',
        controller: 'clasesController'
      }).
      when('/alumnos', {
        templateUrl: '/maestroPer/html/views/alumnos.html',
        controller: 'alumnosController'
      }).
      when('/tareas', {
        templateUrl: '/maestroPer/html/views/tareas.html',
        controller: 'tareasController'
      }).
      otherwise({
        redirectTo: '/'
      });
  }]);