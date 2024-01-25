<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Parlamentar extends Model implements HasMedia
{
    use HasFactory, HasUuids, InteractsWithMedia;

    protected $with = ['partido'];
    protected $table =  'parlamentares';

    protected $fillable = [
        'nome',
        'nome_politico',
        'data_nascimento',
        'estado_civil',
        'sexo',
        'suplente',
        'formacao',
        'nivel_intrucao',
        'partido_id',
        'ativo',
        'setor_id',
    ];

    public function partido(): BelongsTo
    {
        return $this->belongsTo(PartidoPolitico::class, 'partido_id');
    }

    public function gabinete(): BelongsTo
    {
        return $this->belongsTo(Setor::class, 'setor_id');
    }
}
