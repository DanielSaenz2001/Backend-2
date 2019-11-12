<?php

namespace App\Http\Controllers;

use App\Provincia;
use Illuminate\Http\Request;

class ProvinciaController extends Controller
{
    public function index()
    {
        $provincias = Provincia::all(); 
        return response()->json($provincias);
    }

    public function create(Request $request)
    {
        Provincia::create($request-> all());
        return response()->json(['success'=> true]);
    }
    public function show($id)
    {
        $provincias= Provincia::find($id);
        return response()->json($provincias);
    }
    public function update(Request $request, $id)
    {
        Provincia::findOrFail($id)->update($request->all());
    }
    public function destroy($id)
    {
        Provincia::findOrFail($id)->delete();
    }
}
