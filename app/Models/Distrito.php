<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use HasFactory;


    protected $table = 'distrito';

    protected $fillable = ['nome', 'provincia_id', 'estado']; // Atributos que podem ser preenchidos
}
