<?php

namespace App\Http\Controllers;

use App\EpEspecialidades;
use Illuminate\Http\Request;

class EpEspecialidadController extends Controller
{
    public function index()
    {
        $ep_especialidad = EpEspecialidades::all(); 
        return response()->json($ep_especialidad);
    }

    public function create(Request $request)
    {
        EpEspecialidades::create($request-> all());
        return response()->json(['success'=> true]);
    }
    public function show($id)
    {
        $ep_especialidad= EpEspecialidades::find($id);
        return response()->json($ep_especialidad);
    }
    public function update(Request $request, $id)
    {
        EpEspecialidades::findOrFail($id)->update($request->all());
    }
    public function destroy($id)
    {
        EpEspecialidades::findOrFail($id)->delete();
    }
}
