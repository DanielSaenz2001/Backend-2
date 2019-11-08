<?php

namespace App\Http\Controllers;
use App\Departamentos;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = Departamentos::all(); 
        return response()->json($departamentos);
    }

    public function create(Request $request)
    {
        Departamentos::create($request-> all());
        return response()->json(['success'=> true]);
    }
    public function show($id)
    {
        $departamentos= Departamentos::find($id);
        return response()->json($departamentos);
    }
    public function update(Request $request, $id)
    {
        Paises::findOrFail($id)->update($request->all());
    }
    public function destroy($id)
    {
        Paises::findOrFail($id)->delete();
    }
}
