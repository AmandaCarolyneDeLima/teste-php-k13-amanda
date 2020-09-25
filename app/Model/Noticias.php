<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Noticias extends Model
{
    protected $fillable = Array(
        'imagem',
        'data',
        'titulo',
        'conteudo',
    );
}
