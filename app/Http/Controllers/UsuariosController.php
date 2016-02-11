<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
//clases --> illuminate empaqueta peticion como objeto, wrapper BD.

class UsuariosController extends Controller
{
    public function login(Request $request){
        $data = array();
        if($request->session()->has('error')) $data['error'] = $request->session()->get('error');
        return view('index',$data);
    }
    
    public function acceder(Request $request){
    	$input = $request->all(); //-> metodos

    	$usuario = DB::table('usuarios')->where('username', '=', $input['username'])->first(); //genera objeto, con las columnas como atributos
                                                                                                //obtiene el primero que encuentra

    	if(isset($usuario)){ //si retorna usuario =! null, asigna espacio en memoria. isset verifica que exista espacio en memoria
    		if(strcmp($usuario->password, $input['password']) == 0){ //strcmp compara strings lexicamente
    			$request->session()->put('id',$usuario->id);
                $request->session()->put('username',$usuario->username);
                $request->session()->put('nombre',$usuario->nombre);
                $request->session()->put('ap_paterno',$usuario->ap_paterno);
                $request->session()->put('tipo_usuario',$usuario->id_tipo_usuario);                  

                if($usuario->id_tipo_usuario == 1){
    				return redirect('maestroPerfil');
    			}
                else if($usuario->id_tipo_usuario == 2){
                    return redirect('padrePerfil');
                }
                else{
                    return redirect('alumnoPerfil');
                }
    		}
            else{
                $request->session()->flash('error','Usuario y contraseña no coinciden');
                return redirect('/');       
            }
    	}
        else{
            $request->session()->flash('error','Usuario incorrecto');
            return redirect('/');
        } 
    }

    public function maestroPerfil(Request $request){
        if($request->session()->has('username') && $request->session()->has('tipo_usuario') == 1){
            return view('maestroPerfil');
        }
        else return redirect('/');
    }

    public function padrePerfil(Request $request){
        if($request->session()->has('username') && $request->session()->has('tipo_usuario') == 2){
            return view('padrePerfil');
        }
        else return redirect('/');
    }

    public function alumnoPerfil(Request $request){
        if($request->session()->has('username') && $request->session()->has('tipo_usuario') == 3){
            return view('alumnoPerfil');
        }
        else return redirect('/');
    }

    public function cerrarSesion(Request $request){
        $request->session()->flush();
        return redirect('/');
    }

    public function getUsuario(Request $request){
        if($request->session()->has('username')){
            $usuario['nombre'] = $request->session()->get('nombre');
            $usuario['ap_paterno'] = $request->session()->get('ap_paterno');
            $usuario['username'] = $request->session()->get('username');
            $usuario['tipo_usuario'] = $request->session()->get('tipo_usuario');

            return response()->json($usuario);             
        }
    }

    public function todoUsuario(Request $request){
        $usuario = DB::table('usuarios')->where('username','=',$request->session()->get('username'))->first();

        unset($usuario->password);

        return response()->json($usuario);
    }

    public function getAllAlumnos(Request $request){
        $profesor = DB::table('usuarios')->where('username','=',$request->session()->get('username'))->first();
        $clases = DB::table('clases')->where('id_profesor', '=',$profesor->id)->get();
        $grupos = [];

        foreach ($clases as $clase) {
            $grupos[] = $clase->id_grupo;
        }

        $alumnos = DB::table('usuarios')->whereIn('id_grupo',$grupos)->get();

        foreach ($alumnos as $alumno) {
            $padre = DB::table('usuarios')->where('id','=',$alumno->id_padre)->first();
            $alumno->padre = $padre;

            $madre = DB::table('usuarios')->where('id','=',$alumno->id_madre)->first();
            $alumno->madre = $madre;

            $grupo = DB::table('grupos')->where('id','=',$alumno->id_grupo)->first();
            $alumno->grupo = $grupo;
        }
        return response()->json($alumnos);
    }

    public function getAllTareas(Request $request){
        $clases = DB::table('clases')->where('id_profesor','=',$request->session()->get('id'))->get();

        $clasesArray = [];
        $activas = 0;
        $terminadas = 0;

        foreach ($clases as $clase) {
            $clasesArray[] = $clase->id;
        }

        $tareas = DB::table('tareas')->whereIn('id_clase',$clasesArray)->get(); 

        foreach ($tareas as $tarea) {
            $materia = DB::table('materias')->where('id','=',$tarea->id_materia)->first();
            $tarea->materia = $materia;

            if ($tarea->estado == 'activa') {
                $activas = $activas + 1;
            }
            else{
                $terminadas = $terminadas + 1;
            }
        }

        // $tareas->activas = $activas;
        // $tareas->terminadas = $terminadas;

        return response()->json($tareas);
    }

    public function getAllClases(Request $request){
        $clases = DB::table('clases')->where('id_profesor','=',$request->session()->get('id'))->get();

        foreach ($clases as $clase){
            $materia = DB::table('materias')->where('id','=',$clase->id_materia)->first();
            $clase->materia = $materia;

            $grupo = DB::table('grupos')->where('id','=',$clase->id_grupo)->first();
            $clase->grupo = $grupo;

            $alumnos = DB::table('usuarios')->where('id_grupo','=',$clase->id_grupo)->get();
            $clase->alumnos = $alumnos;
        }

        return response()->json($clases);
    }
}
