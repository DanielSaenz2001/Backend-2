<?php

namespace App\Http\Controllers;

use App\Egresados;
use Illuminate\Http\Request;

class EgresadosController extends Controller
{
    public function index()
    {
        $egresados = Egresados::all(); 
        return response()->json($egresados);
    }

    public function create(Request $request)
    {
        $egresados = new Egresados();
        $egresados->codigo = $request->codigo;
        $egresados->celular = $request->celular;
        $egresados->estado_actualizaciones = $request->estado_actualizaciones;
        $egresados->fec_actualizacion = $request->fec_actualizacion;
        $egresados->persona_id = $request->persona_id;
        $egresados->domicilio_actual = $request->provincia;
        $egresados->pais = $request->pais;
        $egresados->departamento = $request->departamento;
        $egresados->save();
        return response()->json($egresados);
    }
    public function show($id)
    {
        $egresados= Egresados::find($id);
        return response()->json($egresados);
    }
    public function update(Request $request, $id)
    {
        Egresados::findOrFail($id)->update($request->all());
        return response()->json($request->all());
    }
    public function destroy($id)
    {
        Egresados::findOrFail($id)->delete();
    }
}
