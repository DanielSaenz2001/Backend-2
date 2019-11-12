<?php

namespace App\Http\Controllers;

use App\EscuelaProfecional;
use Illuminate\Http\Request;

class EscuelaProfecionalController extends Controller
{
    public function index()
    {
        $escuela_profesional = EscuelaProfecional::all(); 
        return response()->json($escuela_profesional);
    }

    public function create(Request $request)
    {
        EscuelaProfecional::create($request-> all());
        return response()->json(['success'=> true]);
    }
    public function show($id)
    {
        $escuela_profesional= EscuelaProfecional::find($id);
        return response()->json($escuela_profesional);
    }
    public function update(Request $request, $id)
    {
        EscuelaProfecional::findOrFail($id)->update($request->all());
    }
    public function destroy($id)
    {
        EscuelaProfecional::findOrFail($id)->delete();
    }
}
