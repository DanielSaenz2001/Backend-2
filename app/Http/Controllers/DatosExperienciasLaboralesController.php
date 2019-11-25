<?php

namespace App\Http\Controllers;

use App\DatosExperienciasLaborales;
use Illuminate\Http\Request;

class DatosExperienciasLaboralesController extends Controller
{
    public function index()
    {
        $result = User::join('personas', 'personaid', '=', 'personas.id')
        ->join('egresados', 'egresados.persona_id', '=', 'personas.id')
        ->join('experiencias_laborales', 'experiencias_laborales.egresado_id', '=', 'egresados.id')
        ->join('empresas', 'experiencias_laborales.empresa_id', '=', 'empresas.id')
        ->where('users.id','=',auth()->user()->id)
        ->select('experiencias_laborales.id','experiencias_laborales.validacion_fecha','experiencias_laborales.is_validando',
        'experiencias_laborales.descripcion_val','empresas.nombre as empresa')
        ->get();
        return response()->json($result);
    }

    public function create(Request $request)
    {
        $datos = new DatosExperienciasLaborales();
        $datos->descripccion = $request->descripccion;
        $datos->estado = $request->estado;
        $datos->cargo = $request->cargo;
        $datos->fech_inicio = $request->fech_inicio;
        $datos->fech_fin = $request->fech_fin;
        $datos->experiencia_laboral_id = $request->experiencia_laboral_id;
        $datos->save();
        return response()->json(['success'=> true]);
    }
    public function show($id)
    {
        $exp= DatosExperienciasLaborales::find($id);
        return response()->json($exp);
    }
    public function update(Request $request, $id)
    {
        DatosExperienciasLaborales::findOrFail($id)->update($request->all());
        return response()->json($request->all());
    }
    public function destroy($id)
    {
        DatosExperienciasLaborales::findOrFail($id)->delete();
    }
}
