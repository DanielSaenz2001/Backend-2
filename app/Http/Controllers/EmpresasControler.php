<?php

namespace App\Http\Controllers;

use App\Empresas;
use Illuminate\Http\Request;

class EmpresasControler extends Controller
{
    public function index()
    {
        $empresas = Empresas::all(); 
        return response()->json($empresas);
    }

    public function create(Request $request)
    {
        Empresas::create($request-> all());
        return response()->json(['success'=> true]);
    }
    public function show($id)
    {
        $empresas= Empresas::find($id);
        return response()->json($empresas);
    }
    public function update(Request $request, $id)
    {
        Empresas::findOrFail($id)->update($request->all());
        return response()->json($request->all());
    }
    public function destroy($id)
    {
        Empresas::findOrFail($id)->delete();
    }
}
