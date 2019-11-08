<?php

namespace App\Http\Controllers;

use App\Persona;
use App\User;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    
    public function index()
    {
        $persona = Persona::all(); 
        return response()->json($persona);
    }

    public function create(Request $request)
    {
        $persona = new Persona();
        $persona->id = $request->id;
        $persona->nombre = $request->nombre;
        $persona->ap_paterno = $request->ap_paterno;
        $persona->ap_materno = $request->ap_materno;
        $persona->celular = $request->celular;
        $persona->dni = $request->dni;
        $persona->pais = $request->pais;
        $persona->departamento = $request->departamento;
        $persona->email = $request->email;
        $persona->fec_nacimiento = $request->fec_nacimiento;
        $persona->est_civil = $request->est_civil;
        $persona->domicilio_actual = $request->domicilio_actual;
        $persona->sexo = $request->sexo;
        $persona->dependiente = $request->dependiente;

        $persona->save();
        echo $persona->id;
        return response()->json($persona->id);
    }
    public function show($id)
    {
        $persona= Persona::find($id);
        return response()->json($persona);
    }
    public function update(Request $request, $id)
    {
        persona::findOrFail($id)->update($request->all());
    }
    public function destroy($id)
    {
        persona::findOrFail($id)->delete();
    }
    public function me()
    {
        $result = User::join('personas', 'personaID', '=', 'personas.id')
        ->join('paises', 'personas.pais', '=', 'paises.id')
        ->join('departamentos', 'personas.departamento', '=', 'departamentos.id')->where('personaID','=',auth()->user()->id)
        ->select('users.name as usuario','users.avatar','personas.nombre','personas.ap_materno','users.role',
        'personas.ap_paterno','personas.dni','personas.celular','personas.dni', 'paises.nombre as pais',
        'personas.email','personas.fec_nacimiento','personas.est_civil','personas.domicilio_actual','personas.sexo'
        ,'personas.dependiente','departamentos.nombre as departamentos','personas.id as persona_ID','users.id as user_ID')
        ->get();
        return response()->json($result);
    }
    public function PersonasNull(){
        $resultado = Persona::join('paises', 'personas.pais', '=', 'paises.id')
        ->join('departamentos', 'personas.departamento', '=', 'departamentos.id')->where([['personas.dependiente', '=', !null]])
        ->select('personas.nombre','personas.ap_materno','personas.ap_paterno','personas.dni','personas.celular','personas.dni', 'paises.nombre as pais',
        'personas.email','personas.fec_nacimiento','personas.est_civil','personas.domicilio_actual','personas.sexo'
        ,'personas.dependiente','departamentos.nombre as departamentos','personas.id as persona_ID')
        ->get();

        return response()->json($resultado);     
    }
}
