<?php

namespace App\Http\Controllers;

use App\EscuelaProfecionales;
use Illuminate\Http\Request;

class EscuelaProfecionalController extends Controller
{
    public function index()
    {
        
        $egresados = EscuelaProfecionales::join('facultades', 'escuela_profecionales.facultad_id', '=', 'facultades.id')
        ->select('facultades.nombre as facultad_id','escuela_profecionales.nombre','escuela_profecionales.estado_acreditacion','escuela_profecionales.id')
        ->get();

        return response()->json($egresados);
    }

    public function create(Request $request)
    {
        EscuelaProfecionales::create($request-> all());
        return response()->json(['success'=> true]);
    }
    public function show($id)
    {
        $escuela_profesional= EscuelaProfecionales::find($id);
        return response()->json($escuela_profesional);
    }
    public function update(Request $request, $id)
    {
        EscuelaProfecionales::findOrFail($id)->update($request->all());
    }
    public function destroy($id)
    {
        EscuelaProfecionales::findOrFail($id)->delete();
    }
}
