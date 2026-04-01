<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['user_id', 'nome', 'descricao', 'categoria', 'quantidade', 'preco', 'fornecedor'];
}