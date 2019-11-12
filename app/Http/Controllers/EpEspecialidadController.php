<?php

namespace App\Http\Controllers;

use App\EpEspecialidad;
use Illuminate\Http\Request;

class EpEspecialidadController extends Controller
{
    public function index()
    {
        $ep_especialidad = EpEspecialidad::all(); 
        return response()->json($ep_especialidad);
    }

    public function create(Request $request)
    {
        EpEspecialidad::create($request-> all());
        return response()->json(['success'=> true]);
    }
    public function show($id)
    {
        $ep_especialidad= EpEspecialidad::find($id);
        return response()->json($ep_especialidad);
    }
    public function update(Request $request, $id)
    {
        EpEspecialidad::findOrFail($id)->update($request->all());
    }
    public function destroy($id)
    {
        EpEspecialidad::findOrFail($id)->delete();
    }
}
