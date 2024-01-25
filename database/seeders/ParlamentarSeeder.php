<?php

namespace Database\Seeders;

use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParlamentarSeeder extends Seeder
{
    use TruncateTable, DisableForeignKeys;

    var $data = [
        [
            'nome' => 'MALU FERNANDES',
            'nome_politico' => 'MARIA LUIZA FERNANDES',
            'nivel_intrucao' => '5',
            'ativo' => true,
        ],
        [
            'nome' => 'PEDRO HIDEKI KOMURA',
            'nome_politico' => 'PEDRO KOMURA',
            'nivel_intrucao' => '5',
            'ativo' => true,
        ],
        [
            'nome' => 'MARCOS PAULO TAVARES FURLAN',
            'nome_politico' => 'MARCOS FURLAN',
            'nivel_intrucao' => '5',
            'ativo' => true,
        ],
        [
            'nome' => 'JOSÉ FRANCIMÁRIO VIEIRA DE MACEDO',
            'nome_politico' => 'FAROFA',
            'nivel_intrucao' => '5',
            'ativo' => true,
        ]

    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disableForeignKeys();
        $this->truncate('parlamentares');
        foreach($this->data as $parlamentar)
        {
            $p = \App\Models\Parlamentar::factory()->create($parlamentar);
        }
        // $parlamentares = \App\Models\Parlamentar::factory(50)->create();
        $this->enableForeignKeys();

    }
}
