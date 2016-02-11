<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/','UsuariosController@login');
$app->post('/acceder', 'UsuariosController@acceder');
$app->get('/cerrarSesion','UsuariosController@cerrarSesion');

$app->get('/maestroPerfil','UsuariosController@maestroPerfil');
$app->get('/padrePerfil','UsuariosController@padrePerfil');
$app->get('/alumnoPerfil','UsuariosController@alumnoPerfil');


$app->group(['prefix' => '/api/v1', 'namespace' => 'App\Http\Controllers'], function($app){
	$app->get('/usuario','UsuariosController@getUsuario');
	$app->get('/alumnos','UsuariosController@getAllAlumnos');
	$app->get('/todoUsuario','UsuariosController@todoUsuario');
	$app->get('/tareas','UsuariosController@getAllTareas');
	$app->get('/clases','UsuariosController@getAllClases');
});