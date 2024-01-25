<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    use HasFactory, HasUuids;

    protected $table =  'setores';

    protected $fillable = [
        'nome',
        'gabinete'
    ];

    public static function gabinetes($columns = ['*']):array
    {
        return Setor::query()->where('gabinete', '=', true)->get($columns)->toArray();
    }
}
