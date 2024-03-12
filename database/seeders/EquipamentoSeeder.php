<?php

namespace Database\Seeders;

use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipamentoSeeder extends Seeder
{

    use TruncateTable, DisableForeignKeys;

    var $data = [
        [
            'descricao' => 'Computador Concordia',
            'patrimonio' => '0001',
            'observacao' => 'Computador Concordia - adquirido em 2023',
            'atributos' => ['cor' => 'preto', 'Office' => '2021', 'usuário' => 'adm.drh.e01'],
        ],
        [
            'descricao' => 'Computador Concordia',
            'patrimonio' => '0002',
            'observacao' => 'Computador Concordia - adquirido em 2023',
            'atributos' => ['cor' => 'preto', 'Office' => '2021', 'usuário' => 'adm.drh.e02', 'Windows' => '11', 'Serial Windows' => 'XXXX-YYYYY-ZZZZZ'],
        ],
        [
            'descricao' => 'Computador Concordia',
            'patrimonio' => '0003',
            'observacao' => 'Computador Concordia - adquirido em 2023',
            'atributos' => ['cor' => 'preto', 'Office' => '2021', 'Windows' => '10', 'usuário' => 'adm.drh.e03', 'Situação' => 'Encaminhado para Manutenção'],
        ],
    ];


    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disableForeignKeys();
        $this->truncate('equipamentos');
        foreach($this->data as $equipamento)
        {
            $p = \App\Models\Equipamento::factory()->create($equipamento);
        }
        // $parlamentares = \App\Models\Parlamentar::factory(50)->create();
        $this->enableForeignKeys();
    }
}
