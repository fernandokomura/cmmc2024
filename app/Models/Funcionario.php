<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Funcionario extends Model
{
    use HasFactory, HasUuids;
    protected $table =  'funcionarios';

    protected $with = ['setor'];

    protected $fillable = [
        'nome',
        'rgf',
        'user_id',
        'setor_id',
    ];

    public function setor(): BelongsTo
    {
        return $this->belongsTo(Setor::class, 'setor_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
