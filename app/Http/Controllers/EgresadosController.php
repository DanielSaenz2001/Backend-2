<?php

namespace App\Http\Controllers;
use App\User;
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
    public function egresados(){
       $result = User::join('personas', 'personaid', '=', 'personas.id')
        ->join('egresados', 'egresados.persona_id', '=', 'personas.id')
        ->join('provincias', 'personas.provincia', '=', 'provincias.id')
        ->join('departamentos', 'provincias.dep_id', '=', 'departamentos.id')
        ->join('paises', 'departamentos.pais_id', '=', 'paises.id')
        ->where('users.id','=',auth()->user()->id)
        ->select('users.name as usuario','users.avatar','personas.nombre','personas.ap_materno','users.rol',
        'personas.ap_paterno', 'paises.nombre as pais',
        'personas.email','personas.fec_nacimiento','personas.est_civil','personas.sexo','personas.activo'
        ,'personas.dependiente','departamentos.nombre as departamentos','personas.id as persona_ID','users.id as user_ID','provincias.nombre as provincia', 'personas.dni')
        ->get();
        return response()->json($result);
    }
}
