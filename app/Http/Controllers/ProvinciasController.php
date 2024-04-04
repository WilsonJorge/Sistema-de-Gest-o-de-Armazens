<?php
// app/Http/Controllers/ProvinciasController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provincia;
use App\Models\Historico;

class ProvinciasController extends Controller
{
    public function list(Request $request)
    {
        
        $query = Provincia::query();

        if ($request->has('estado')) {
            $estado = $request->input('estado');
            $query->where('estado', $estado);
        }

        if ($request->has('nome')) {
            $nome = $request->input('nome');
            $query->where('nome', 'like', '%' . $nome . '%');
        }

        $provincias = $query->get();
    
        return view('provincia.tabela', ["provincias" => $provincias ?? []]);
    }

    public function show($id)
    { 
        $provincia = Provincia::where('id', $id)->get();
    
        return view('provincia.detalhes', ["provincia" => $provincia ?? []]);



    }
    public function show_details($id)
    { 

        $provincia = Provincia::find($id);

        $historico = Historico::where('row_id', $id)
                       ->where('tabela', 'provincia')
                       ->get();


        if (!$provincia) {
            return response()->json(['error' => 'Provincia não encontrada'], 404);
        }
        
        return response()->view('provincia.detalhes', ["provincia" => $provincia, "historico" => $historico]);
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
            $historico = new Historico();
            

            if ($provincia) {
                $json['success'] = true;
                $json['nome'] = $provincia->nome;
                $json['message'] = 'Província de ' . $provincia->nome . ' adicionada com sucesso.';
                $json['code'] = 200;

                $historico->descricao = 'Registrou a província de ' . $provincia->nome . '.';
                $historico->tabela = $provincia->getTable(); 
                $historico->row_id = $provincia->id; 
                $historico->user_id = 1; 
                $historico->save();
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
