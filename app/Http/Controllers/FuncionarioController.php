<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provincia;

class FuncionarioController extends Controller
{
    public function index()
    {

        $provincias = Provincia::all();
        
        return view('funcionarios.index', compact('provincias'));
        
        
    }

    public function create(){

        $provincias = Provincia::all();
        return view('funcionarios.create', compact('provincias'));
    }

}
