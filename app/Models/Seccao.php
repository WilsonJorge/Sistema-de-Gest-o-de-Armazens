<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccao extends Model
{
    use HasFactory;


    protected $table = 'seccao';

    protected $fillable = ['descricao', 'user_id']; // Atributos que podem ser preenchidos

    public function vagas()
    {
        return $this->hasMany(Vaga::class, 'seccao_id');
    }
}
