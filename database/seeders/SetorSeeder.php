<?php

namespace Database\Seeders;

use App\Models\Setor;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SetorSeeder extends Seeder
{
    use TruncateTable, DisableForeignKeys;

    var $data = [
        [
            'nome' => 'DIVISÃO DE T.I.',
            'gabinete' => false,
        ],
        [
            'nome' => 'SETOR DE TRANSPORTE',
            'gabinete' => false,
        ],
        [
            'nome' => 'SETOR DE TELEFONIA',
            'gabinete' => false,
        ],
        [
            'nome' => 'DIVISÃO DE INFRAESTRUTURA',
            'gabinete' => false,
        ],
        [
            'nome' => 'SECRETARIA GERAL ADMINISTRATIVA',
            'gabinete' => false,
        ],
        [
            'nome' => 'SECRETARIA GERAL LEGISLATIVA.',
            'gabinete' => false,
        ],
        [
            'nome' => 'GABINETE 01',
            'gabinete' => true,
        ],
        [
            'nome' => 'GABINETE 02',
            'gabinete' => true,
        ],
        [
            'nome' => 'GABINETE 03',
            'gabinete' => true,
        ],
        [
            'nome' => 'GABINETE 04',
            'gabinete' => true,
        ],
        [
            'nome' => 'GABINETE 05',
            'gabinete' => true,
        ],
        [
            'nome' => 'GABINETE 06',
            'gabinete' => true,
        ],
        [
            'nome' => 'GABINETE 07',
            'gabinete' => true,
        ],
        [
            'nome' => 'GABINETE 08',
            'gabinete' => true,
        ],
        [
            'nome' => 'GABINETE 09',
            'gabinete' => true,
        ],
        [
            'nome' => 'GABINETE 10',
            'gabinete' => true,
        ],
        [
            'nome' => 'GABINETE 11',
            'gabinete' => true,
        ],
        [
            'nome' => 'GABINETE 12',
            'gabinete' => true,
        ],
        [
            'nome' => 'GABINETE 13',
            'gabinete' => true,
        ],
        [
            'nome' => 'GABINETE 14',
            'gabinete' => true,
        ],
        [
            'nome' => 'GABINETE 15',
            'gabinete' => true,
        ],
        [
            'nome' => 'GABINETE 16',
            'gabinete' => true,
        ],
        [
            'nome' => 'GABINETE 17',
            'gabinete' => true,
        ],
        [
            'nome' => 'GABINETE 18',
            'gabinete' => true,
        ],
        [
            'nome' => 'GABINETE 19',
            'gabinete' => true,
        ],
        [
            'nome' => 'GABINETE 20',
            'gabinete' => true,
        ],
        [
            'nome' => 'GABINETE 21',
            'gabinete' => true,
        ],
        [
            'nome' => 'GABINETE 22',
            'gabinete' => true,
        ],
        [
            'nome' => 'GABINETE 23',
            'gabinete' => true,
        ],
        [
            'nome' => 'GABINETE DA PRESIDÊNCIA',
            'gabinete' => false,
        ],
    ];


    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disableForeignKeys();
        $this->truncate('setores');
        foreach($this->data as $setor)
        {
            $p = Setor::factory()->create($setor);
        }
        $this->enableForeignKeys();
    }
}
