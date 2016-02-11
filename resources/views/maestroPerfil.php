<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SPAA - Maestros</title>
    <!-- Bootstrap Core CSS -->
    <link href='https://fonts.googleapis.com/css?family=Amaranth|Montserrat' rel='stylesheet' type='text/css'>
    <link href="lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font awesome CSS -->
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.min.css">
    <!-- Angular chart CSS -->
    <link rel="stylesheet" href="lib/angular-chart.js/dist/angular-chart.min.css">
    <!-- CSS común & fuentes-->
    <link rel="stylesheet" href="common/css/style.css"> 
    <!-- rutas deben empezar public = donde se bajan los recursos-->
    <!-- Custom CSS -->
    <!-- <link href="css/simple-sidebar.css" rel="stylesheet"> -->
</head>

<body ng-app="maestroPerfil" ng-controller="maestroController" ng-init="selecTab(1, '/perfil')">
    
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="nav nav-tabs sidebar-nav">
                <li>
                    <img class="nav-logo col-lg-offset-2" src="common/img/logo.png" alt="logo">
                </li>
                <li class="sidebar-brand">
                    Bienvenid@ {{username.nombre | uppercase}}
                </li>
                <li ng-class="{active : tab === 1}">
                    <a ng-click="selecTab(1, '/perfil')">Mi perfil<i class="fa fa-male"></i></a>
                </li>
                <li ng-class="{active : tab === 2}">
                    <a ng-click="selecTab(2, '/clases')">Grupos / Materias<i class="fa fa-users"></i></a>
                </li>
                <li ng-class="{active : tab === 3}">
                    <a ng-click="selecTab(3, '/alumnos')">Alumnos<i class="fa fa-graduation-cap"></i></a>
                </li>
                <li ng-class="{active : tab === 4}">
                    <a ng-click="selecTab(4, '/tareas')">Tareas<i class="fa fa-calendar"></i></a>
                </li>
                <li class="disabled">
                    <a>Mensajes<i class="fa fa-envelope-o"></i></a>
                </li>
                <li class="disabled">
                    <a>Notificaciones<i class="fa fa-exclamation-circle"></i></a>
                </li>
                <li class="disabled">
                    <a>Escribir mensaje<i class="fa fa-commenting-o"></i></a>
                </li>
                <li>
                    <a href="cerrarSesion">Cerrar sesión<i class="fa fa-power-off"></i></a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div ng-view></div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="lib/jquery/dist/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="lib/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Librería de SweetAlert -->
    <script src="lib/sweetalert/dist/sweetalert.min.js"></script>
    
    <!-- Librería de Angular Js -->
    <script src="lib/angular/angular.min.js"></script>

    <!-- Librería de Angular Js Routes -->
    <script src="lib/angular-route/angular-route.min.js"></script>

    <!-- Libreria de Angular Chart -->
    <script src="lib/Chart.js/Chart.min.js"></script>
    <script src="lib/angular-chart.js/dist/angular-chart.js"></script>


    <!--Modulo de Maestro Perfil -->
    <script src="maestroPer/js/app.js" type="text/javascript"></script>
    <script src="maestroPer/js/config/maestroPerfil.config.js" type="text/javascript"></script>
    <script src="maestroPer/js/controllers/maestroPerfil.controller.js" type="text/javascript"></script>
    <!-- <script src="maestroPer/js/directives/maestroPerfil.directives.js" type="text/javascript"></script> -->

    
    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
