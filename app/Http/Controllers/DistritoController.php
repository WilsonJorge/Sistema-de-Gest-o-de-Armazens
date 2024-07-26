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
            

            if ($distrito) {
                $json['success'] = true;
                $json['nome'] = $distrito->nome;
                $json['message'] = 'Província de ' . $distrito->nome . ' adicionada com sucesso.';
                $json['code'] = 200;

                $descricao = 'Registou a província de ' . $distrito->nome . '.';
                $historico->insert($distrito->getTable(), $distrito->id, $descricao);
            } else {
                $json['success'] = false;
                $json['message'] = 'Erro ao adicionar a província de '. $distrito->nome;
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
