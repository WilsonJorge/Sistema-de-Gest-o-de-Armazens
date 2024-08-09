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

        $distritos = Distrito::all();
        $provincias = Provincia::where('estado', 1)->get();



        return view('distrito.index', compact('distritos', 'provincias'));
        
    }

    public function list(Request $request)
    {
        


        $query = Distrito::query();

        if ($request->has('estado')) {
            $estado = $request->input('estado');
            $query->where('estado', $estado);
        }

        if ($request->has('nome')) {
            $nome = $request->input('nome');
            $query->where('nome', 'like', '%' . $nome . '%');
        }

        // Define o número de itens por página (você pode ajustar conforme necessário)
        $itensPorPagina = $request->input('limite', 10); // Padrão: 10 itens por página

        // Recupera as províncias paginadas
        $distritos = $query->paginate($itensPorPagina);

        // Adiciona parâmetros de filtro à URL da páginação
        $distritos->appends($request->query());
    
        return view('distrito.tabela', ["distritos" => $distritos ?? []]);
    }


    public function add(Request $request)
    {
        try {
            $data = $request->validate([
                'nome' => 'required|unique:distrito,nome',
                'provincia_id' => 'required',

            ]);
        
            $distrito = Distrito::create($data);
            $historico = new Historico();
            

            if ($distrito) {
                $json['success'] = true;
                $json['nome'] = $distrito->nome;
                $json['message'] = 'Distrito de ' . $distrito->nome . ' adicionada com sucesso.';
                $json['code'] = 200;

                $descricao = 'Registou o distrito de ' . $distrito->nome . '.';
                $historico->insert($distrito->getTable(), $distrito->id, $descricao);
            } else {
                $json['success'] = false;
                $json['message'] = 'Erro ao adicionar o distrito de '. $distrito->nome;
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

    public function show_details($id)
    { 

        $distrito = Distrito::find($id);

        $historico = Historico::where('row_id', $id)
                       ->where('tabela', 'distrito')
                       ->get();


        if (!$distrito) {
            return response()->json(['error' => 'Distrito não encontrado'], 404);
        }
        
        return response()->view('distrito.detalhes', ["distrito" => $distrito, "historico" => $historico]);
    }

    public function delete()
    {
        $id = $_POST['distrito_id'];
        $estado = $_POST['estado'];
        $json['success'] = false;
        $distrito = Distrito::find($id);
        $historico = new Historico();

        if (!empty($distrito)) {
            $data = ['estado' => $estado];
            if ($distrito->update($data)) {
                $json['success'] = true;
                if($estado == '1'){
                    $json['message'] = 'Distrito activada com sucesso.';

                    $descricao = 'Activou o distrito de ' . $distrito->nome . '.';
                    $historico->insert($distrito->getTable(), $distrito->id, $descricao);

                }else if($estado == '2'){
                    $json['message'] = 'Distrito removido com sucesso.';
                    
                    $descricao = 'Removeu o distrito de ' . $distrito->nome . '.';
                    $historico->insert($distrito->getTable(), $distrito->id, $descricao);
                }
                $json['code'] = 200;
            }else{
                $json['success'] = false;
                $json['message'] = 'Ocorreu um erro ao remover o distrito.';
                $json['code'] = 500;
            }
        }
        echo json_encode($json);
    }

    public function show($id)
    { 
        $distrito = Distrito::where('id', $id)->get();
    
        return view('distrito.detalhes', ["distrito" => $distrito ?? []]);



    }

    public function edit()
    {
        $id = $_POST['id'];
        $nome = $_POST['nome_editar'];
        $json['success'] = false;
        $provincia = Provincia::find($id);
        $historico = new Historico();

        if (!empty($provincia)) {
            $data = ['nome' => $nome];
            if ($provincia->update($data)) {
                $json['success'] = true;
                $json['message'] = 'Província ' . $provincia->nome . ' actualizada com sucesso.';
                $json['code'] = 200;

                $descricao = "Actualizou a província de ". $provincia->nome ."";
                $historico->insert($provincia->getTable(), $provincia->id, $descricao);

            }else{
                $json['success'] = false;
                $json['message'] = 'Ocorreu um erro ao editar a província.';
                $json['code'] = 500;
            }
        }
        echo json_encode($json);
    }


}
