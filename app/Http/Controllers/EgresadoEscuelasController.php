<?php

namespace App\Http\Controllers;

use App\EgresadoEscuelas;
use Illuminate\Http\Request;

class EgresadoEscuelasController extends Controller
{
    public function index()
    {
        $empresas = EgresadoEscuelas::all(); 
        return response()->json($empresas);
    }

    public function create(Request $request)
    {
        EgresadoEscuelas::create($request-> all());
        return response()->json(['success'=> true]);
    }
    public function show($id)
    {
        $empresas= EgresadoEscuelas::find($id);
        return response()->json($empresas);
    }
    public function update(Request $request, $id)
    {
        EgresadoEscuelas::findOrFail($id)->update($request->all());
        return response()->json($request->all());
    }
    public function destroy($id)
    {
        EgresadoEscuelas::findOrFail($id)->delete();
    }
}
