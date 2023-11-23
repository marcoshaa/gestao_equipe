<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalhesUser extends Model
{
    use HasFactory;
    protected $table = 'detalhes_user';
    // protected $fillable = [
    //     'id_user',
    //     'sexo',
    //     'data_nascimento',
    //     'formacao',
    //     'cep',
    //     'estado',
    //     'cidade',
    //     'bairro',
    //     'rua',
    //     'numero',
    // ];
}
