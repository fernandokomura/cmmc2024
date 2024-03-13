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
            'atributos' => [['atributo' => 'cor','valor' => 'preto'], ['atributo' => 'Office','valor' => '2021'], ['atributo' => 'usuário','valor' => 'adm.drh.e01']],
        ],
        [
            'descricao' => 'Computador Concordia',
            'patrimonio' => '0002',
            'observacao' => 'Computador Concordia - adquirido em 2023',
            'atributos' => [['atributo' => 'cor','valor' => 'preto'], ['atributo' => 'Office','valor' => '2021'], ['atributo' => 'usuário','valor' => 'adm.drh.e02'], ['atributo' => 'Windows','valor' => '11'], ['atributo' => 'Serial Windows','valor' => 'XXXX-YYYYY-ZZZZZ']],
        ],
        [
            'descricao' => 'Computador Concordia',
            'patrimonio' => '0003',
            'observacao' => 'Computador Concordia - adquirido em 2023',
            'atributos' => [['atributo' => 'cor','valor' => 'preto'], ['atributo' => 'Office','valor' => '2021'], ['atributo' => 'usuário','valor' => 'adm.drh.e03'], ['atributo' => 'Windows','valor' => '10'], ['atributo' => 'Situação','valor' => 'Encaminhado para manutenção']],
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
