<?php
// app/Http/Controllers/ProvinciasController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provincia;

class ProvinciasController extends Controller
{
    public function list(Request $request)
    {
        // $nome = $request->input('nome') ?? "";
        // $estado = $request->input('estado') ?? "";

        // Lógica para buscar dados com base nos parâmetros fornecidos
        // $provincias = Provincia::where('nome', 'like', '%' . $nome . '%')
        //                        ->where('estado', $estado)
        //                        ->get();

        $provincias = Provincia::all();
        return view('provincia.tabela', ["provincias" =>$provincias ?? []]);

        // echo json_encode($provincias);

        // return response()->json(view('provincia.index', ['provincia' => $provincia])->render());
        // return view('provincia.tabela', compact('provincias'));

    }

    public function index(Request $request){
        return view('provincia.index');
    }
}
