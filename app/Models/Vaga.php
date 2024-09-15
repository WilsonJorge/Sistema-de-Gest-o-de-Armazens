<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    use HasFactory;

    protected $table = 'vaga';

    protected $fillable = ['numero', 'seccao_id', 'estado','user_id']; // Atributos que podem ser preenchidos

    //Relacionamento entre a vaga e seccao
    public function seccao()
    {
        return $this->belongsTo(Seccao::class, 'seccao_id');
    }
}
