<?php

namespace Database\Seeders;

use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    use TruncateTable, DisableForeignKeys;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disableForeignKeys();
        $this->truncate('users');
        $users = \App\Models\User::factory()->create([
            'name' => 'Usuario 1',
            'user_name' => 'usuario1',
            'email' => 'usuario1@example.com',
        ]);
        $users = \App\Models\User::factory()->create([
            'name' => 'Usuario 2',
            'user_name' => 'usuario2',
            'email' => 'usuario2@example.com',
        ]);
        $users = \App\Models\User::factory()->create([
            'name' => 'Fernando da Silva Komura',
            'user_name' => 'fernando.komura',
            'email' => 'fernando.komura@cmmc.com.br',
        ]);
        // $users = \App\Models\User::factory(20)->create();
        $this->enableForeignKeys();
    }
}
