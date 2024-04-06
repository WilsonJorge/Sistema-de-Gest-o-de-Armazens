<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    use HasFactory;

    protected $table = 'historico';

    protected $fillable = ['descricao', 'tabela','row_id','user_id'];


    public function insert($atributo, $tabela, $row_id, $descricao){

        $historico = new Historico();

        $historico->descricao = $descricao;
        $historico->tabela = $tabela; 
        $historico->row_id = $row_id; 
        $historico->user_id = 1; 
        $historico->save();

    }
    


}
