<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Vaga;
use App\Models\Historico;
use App\Models\Seccao;




class VagasController extends Controller
{
    public function index()
    {

        $vagas = Vaga::where('estado', 1)->with('seccao')->get();
        $seccoes = Seccao::where('estado', 1)->get();

        return view('vagas.index', compact('vagas','seccoes'));
        
    }

    public function list(Request $request)
    {
        $query = Vaga::query();

        if ($request->has('estado')) {
            $estado = $request->input('estado');
            $query->where('estado', $estado);
        }

        if ($request->has('numero')) {
            $numero = $request->input('numero');
            $query->where('numero', 'like', '%' . $numero . '%');
        }

        // Define o número de itens por página (você pode ajustar conforme necessário)
        $itensPorPagina = $request->input('limite', 10); // Padrão: 10 itens por página

        // Recupera as províncias paginadas
        $vagas = $query->paginate($itensPorPagina);

        // Adiciona parâmetros de filtro à URL da páginação
        $vagas->appends($request->query());
    
        return view('vagas.tabela', ["vagas" => $vagas ?? []]);
    }


    public function add(Request $request)
    {
        try {
            $data = $request->validate([
                'numero' => 'required|unique:vaga,numero',
                'seccao' => 'required',

            ]);
        
            $vaga = Vaga::create($data);
            $historico = new Historico();
            

            if ($vaga) {
                $json['success'] = true;
                $json['nome'] = $vaga->nome;
                $json['message'] = 'Vaga ' .$vaga->seccao. ' | '.$vaga->numero. ' adicionada com sucesso.';
                $json['code'] = 200;

                $descricao = 'Registou a vaga ' .$vaga->seccao. ' | '.$vaga->numero. '.';
                $historico->insert($vaga->getTable(), $vaga->id, $descricao);
            } else {
                $json['success'] = false;
                $json['message'] = 'Erro ao adicionar a vaga ' .$vaga->seccao. ' | '.$vaga->numero;
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

        $vaga = Vaga::find($id);

        $historico = Historico::where('row_id', $id)
                       ->where('tabela', 'vaga')
                       ->get();


        if (!$vaga) {
            return response()->json(['error' => 'Vaga não encontrado'], 404);
        }
        
        return response()->view('vagas.detalhes', ["vaga" => $vaga, "historico" => $historico ?? []]);
    }

    public function delete()
    {
        $id = $_POST['vaga_id'];
        $estado = $_POST['estado'];
        $json['success'] = false;
        $vaga = Vaga::find($id);
        $historico = new Historico();

        if (!empty($vaga)) {
            $data = ['estado' => $estado];
            if ($vaga->update($data)) {
                $json['success'] = true;
                if($estado == '1'){
                    $json['message'] = 'Vaga activada com sucesso.';

                    $descricao = 'Activou a vaga ' .$vaga->seccao. ' | '.$vaga->numero.'.';
                    $historico->insert($vaga->getTable(), $vaga->id, $descricao);

                }else if($estado == '2'){
                    $json['message'] = 'Distrito removido com sucesso.';
                    
                    $descricao = 'Removeu a vaga ' .$vaga->seccao. ' | '.$vaga->numero.'.';
                    $historico->insert($vaga->getTable(), $vaga->id, $descricao);
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
        $vaga = Vaga::where('id', $id)->get();
    
        return view('vagas.detalhes', ["vaga" => $vaga ?? []]);

    }

    public function edit()
    {
        $id = $_POST['id'];
        $nome = $_POST['nome_editar'];
        $json['success'] = false;
        $vaga = Vaga::find($id);
        $historico = new Historico();

        if (!empty($vaga)) {
            $data = ['nome' => $nome];
            if ($vaga->update($data)) {
                $json['success'] = true;
                $json['message'] = 'Vaga ' .$vaga->seccao. ' | '.$vaga->numero. ' actualizada com sucesso.';
                $json['code'] = 200;

                $descricao = "Actualizou a vaga " .$vaga->seccao. ' | '.$vaga->numero.".";
                $historico->insert($vaga->getTable(), $vaga->id, $descricao);

            }else{
                $json['success'] = false;
                $json['message'] = 'Ocorreu um erro ao editar a vaga '.$vaga->seccao. ' | '.$vaga->numero.'.';
                $json['code'] = 500;
            }
        }
        echo json_encode($json);
    }

}
