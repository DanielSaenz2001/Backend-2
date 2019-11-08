<?php

namespace App\Http\Controllers;

use App\Paises;
use Illuminate\Http\Request;

class PaisController extends Controller
{
    public function index()
    {
        $paises = Paises::all(); 
        return response()->json($paises);
    }

    public function create(Request $request)
    {
        Paises::create($request-> all());
        return response()->json(['success'=> true]);
    }
    public function show($id)
    {
        $paises= Paises::find($id);
        return response()->json($paises);
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
