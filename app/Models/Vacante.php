<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    protected $casts = ['ultimo_dia' => 'date'];

    protected $fillable = [
        'titulo',
        'descripcion',
        'salario_id',
        'categoria_id',
        'empresa',
        'ultimo_dia',
        'imagen',
        'user_id',
        'publicada'
    ];
}
