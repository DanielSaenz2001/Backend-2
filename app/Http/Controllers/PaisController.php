<?php

namespace App\Http\Controllers;

use App\Paises;
use App\Departamentos;
use App\Provincia;

class PaisController extends Controller
{
    public function paises()
    {
        $paises = Paises::all(); 
        return response()->json($paises);
    }
    public function provincias()
    {
        $provincias = Provincia::all(); 
        return response()->json($provincias);
    }
    public function departamentos()
    {
        $departamentos = Departamentos::all(); 
        return response()->json($departamentos);
    }
}
