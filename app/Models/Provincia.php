<?php
// app/Models/Provincia.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;
    protected $table = 'provincia';
    protected $fillable = ['nome', 'estado']; // Atributos que podem ser preenchidos em massa

    // Outras configurações e métodos, se necessário

}
