<?php

namespace App\Http\Controllers;

use App\Eventos;
use Illuminate\Http\Request;

class EventosController extends Controller
{
    public function index()
    {
        $evento = Eventos::all(); 
        return response()->json($evento);
    }

    public function create(Request $request)
    {
        $evento = new Eventos();
        $evento->id = $request->id;
        $evento->nombre = $request->nombre;
        $evento->ap_paterno = $request->ap_paterno;
        $evento->ap_materno = $request->ap_materno;
        $evento->celular = $request->celular;
        $evento->provincia = $request->provincia;
        $evento->email = $request->email;
        $evento->fec_nacimiento = $request->fec_nacimiento;
        $evento->est_civil = $request->est_civil;
        $evento->domicilio_actual = $request->domicilio_actual;
        $evento->sexo = $request->sexo;
        $evento->dependiente = $request->dependiente;
        $evento->save();
    }
    public function show($id)
    {
        $evento= Eventos::find($id);
        return response()->json($evento);
    }
    public function update(Request $request, $id)
    {
        Eventos::findOrFail($id)->update($request->all());
    }
    public function destroy($id)
    {
        Eventos::findOrFail($id)->delete();
    }
}
