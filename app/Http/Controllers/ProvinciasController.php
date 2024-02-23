<?php
// app/Http/Controllers/ProvinciasController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provincia;

class ProvinciasController extends Controller
{
    public function list(Request $request)
    {
        $estado = $request->input('estado', ''); 
    
        $provincias = Provincia::where('estado', $estado)->get();
    
        return view('provincia.tabela', ["provincias" => $provincias ?? []]);
    }
    

    public function index(Request $request){
        return view('provincia.index');
    }

    public function add(Request $request)
    {

        try {
            $data = $request->validate([
                'nome' => 'required|unique:provincia,nome',
            ]);
        
            $provincia = Provincia::create($data);

            if ($provincia) {
                $json['success'] = true;
                $json['nome'] = $provincia->nome;
                $json['message'] = 'Província de ' . $provincia->nome . ' adicionada com sucesso.';
                $json['code'] = 200;
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

    public function delete()
    {
        $id = $_POST['provincia'];
        $estado = $_POST['estado'];
        $json['success'] = false;
        $provincia = Provincia::find($id);
        if (!empty($provincia)) {
            $data = ['estado' => $estado];
            if ($provincia->update($data)) {
                $json['success'] = true;
                if($estado == '1'){
                    $json['message'] = 'Província activada com sucesso.';
                }else if($estado == '2'){
                    $json['message'] = 'Província removida com sucesso.';
                }
                $json['code'] = 200;
            }else{
                $json['success'] = false;
                $json['message'] = 'Ocorreu um erro ao remover a província.';
                $json['code'] = 500;
            }
        }
        echo json_encode($json);
    }

    public function edit()
    {
        $id = $_POST['id'];
        $nome = $_POST['nome_editar'];
        $json['success'] = false;
        $provincia = Provincia::find($id);
        if (!empty($provincia)) {
            $data = ['nome' => $nome];
            if ($provincia->update($data)) {
                $json['success'] = true;
                $json['message'] = 'Província ' . $provincia->nome . ' actualizada com sucesso.';
                $json['code'] = 200;
            }else{
                $json['success'] = false;
                $json['message'] = 'Ocorreu um erro ao editar a província.';
                $json['code'] = 500;
            }
        }
        echo json_encode($json);
    }







}
