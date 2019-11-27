<?php

namespace App\Http\Controllers;

use App\Sugerencias;
use Illuminate\Http\Request;

class SugerenciasControler extends Controller
{
    
    public function index()
    {
        
        $sugerencias = Sugerencias::join('users', 'user_creador', '=', 'users.id')
        ->join('personas','personas.id','=','users.personaid')
        ->select('personas.nombre','sugerencias.id','sugerencias.comentario_egresado','sugerencias.fecha_creacion','sugerencias.tipo_comentario'
        ,'sugerencias.comentario_respuesta','sugerencias.fecha_atencion')
        ->get();

        return response()->json($sugerencias);
    }
    public function index2()
    {

        $sugerencias = Sugerencias::where('comentario_respuesta','=',null)

        ->select('sugerencias.id','sugerencias.tipo_comentario','sugerencias.comentario_egresado','sugerencias.fecha_creacion')
        ->orderBy('sugerencias.fecha_creacion','desc')
        ->get();
        return response()->json($sugerencias);
    }

    public function create(Request $request)
    {

        $sugerencias = new Sugerencias();
        $sugerencias->comentario_egresado = $request->comentario_egresado;
        $sugerencias->fecha_creacion = $request->fecha_creacion;
        $sugerencias->tipo_comentario = $request->tipo_comentario;
        $sugerencias->user_creador = $request->user_creador;
        $sugerencias->save();
    }
    public function show($id)
    {
        $sugerencias= Sugerencias::findOrFail($id);
        return response()->json($sugerencias);
    }
    public function updateComentario(Request $request, $id)
    {
        $sugerencias = Sugerencias::findOrFail($id);
        $sugerencias->comentario_egresado = $request->comentario_egresado;
        $sugerencias->tipo_comentario = $request->tipo_comentario;
        $sugerencias->save();
        return response()->json($sugerencias);
    }
    public function updateAdmin(Request $request, $id)
    {
        $sugerencias = Sugerencias::findOrFail($id);
        $sugerencias->comentario_respuesta = $request->comentario_respuesta;
        $sugerencias->fecha_atencion = $request->fecha_atencion;
        $sugerencias->user_administrador = $request->user_administrador;
        $sugerencias->save();
        return response()->json($sugerencias);
    }
    public function destroy($id)
    {
        Sugerencias::findOrFail($id)->delete();
    }
}
