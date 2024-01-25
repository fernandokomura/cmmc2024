<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class PartidoPolitico extends Model implements HasMedia
{
    use HasFactory, HasUuids, InteractsWithMedia;

    protected $table =  'partidos_politicos';

    protected $fillable = [
        'sigla',
        'nome',
        'data_criacao',
        'data_extincao',
    ];
}
