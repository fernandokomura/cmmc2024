<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    use HasFactory, HasUuids;
    protected $table =  'equipamentos';

    protected $fillable = [
        'descricao',
        'patrimonio',
        'observacao',
        'atributos',
    ];

    protected $casts = [
        'atributos' => 'array',
    ];
}
