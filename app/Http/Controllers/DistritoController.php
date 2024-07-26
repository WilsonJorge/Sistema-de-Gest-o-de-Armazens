<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provincia;
use App\Models\Historico;
use App\Models\Distrito;



class DistritoController extends Controller
{

    public function index()
    {

        $provincias = Provincia::all();

        return view('distrito.index', compact('provincias'));
        
    }


    public function add(Request $request)
    {
        try {
            $data = $request->validate([
                'nome' => 'required|unique:distrito,nome',
                'provincia' => 'required',

            ]);
        
            $distrito = Distrito::create($data);
            $historico = new Historico();
            

            if ($provincia) {
                $json['success'] = true;
                $json['nome'] = $provincia->nome;
                $json['message'] = 'Província de ' . $provincia->nome . ' adicionada com sucesso.';
                $json['code'] = 200;

                $descricao = 'Registou a província de ' . $provincia->nome . '.';
                $historico->insert($provincia->nome, $provincia->getTable(), $provincia->id, $descricao);
            } else {
                $json['success'] = false;
                $json['message'] = 'Erro ao adicionar a província de '. $provincia->nome;
                $json['code'] = 500;
            }
        
        } catch (\Illuminate\Validation\ValidationException $e) {
           
            $errors = $e->validator->errors()->all();
        
            $json['success'] = false;
            $json['message'] = $errors;
            $json['code'] = 422; // HTTP 422 Unprocessable Entity
        }
        

        echo json_encode($json);
    }


}
