<?php

namespace Database\Seeders;

use App\Models\PartidoPolitico;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PartidoPoliticoSeeder extends Seeder
{
    use TruncateTable, DisableForeignKeys;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disableForeignKeys();
        $this->truncate('partidos_politicos');
        $niveis = PartidoPolitico::create(['sigla' => 'MDB', 'nome' => 'Movimento Democrático Brasileiro', 'data_criacao' => Carbon::now()]);
        $niveis = PartidoPolitico::create(['sigla' => 'PT', 'nome' => 'Partido dos Trabalhadores', 'data_criacao' => Carbon::now()]);
        $niveis = PartidoPolitico::create(['sigla' => 'PL', 'nome' => 'Partido Liberal', 'data_criacao' => Carbon::now()]);
        $niveis = PartidoPolitico::create(['sigla' => 'PSDB', 'nome' => 'Partido da Social Democracia Brasileira', 'data_criacao' => Carbon::now()]);
        $niveis = PartidoPolitico::create(['sigla' => 'Podemos', 'nome' => 'Podemos', 'data_criacao' => Carbon::now()]);
        $niveis = PartidoPolitico::create(['sigla' => 'PSD', 'nome' => 'Partido Social Democrático', 'data_criacao' => Carbon::now()]);
        $this->enableForeignKeys();
    }
}
