<?php

namespace Database\Seeders;

use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FuncionarioSeeder extends Seeder
{
    use TruncateTable, DisableForeignKeys;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disableForeignKeys();
        $this->truncate('users');
        $this->truncate('funcionarios');

        $user = $this->CriarUsuario('Fernando da Silva Komura', 'fernando.komura','fernando.komura@cmmc.com.br');
        $this->CriarFuncionario($user);

        $user = $this->CriarUsuario('Usuario 1', 'usuario1','usuario1@example.com');
        $this->CriarFuncionario($user);

        $user = $this->CriarUsuario('Usuario 2', 'usuario2','usuario2@example.com');
        $this->CriarFuncionario($user);

        $user = $this->CriarUsuario('Usuario 3', 'usuario3','usuario3@example.com');
        $this->CriarFuncionario($user);


        $this->enableForeignKeys();
    }

    public function CriarUsuario($name, $user_name, $email ): \App\Models\User {

        return \App\Models\User::factory()->create([
            'name' => $name,
            'user_name' => $user_name,
            'email' => $email,
        ]);
    }

    public function CriarFuncionario(\App\Models\User $user ) {

        \App\Models\Funcionario::factory()->create([
            'nome' => $user->name,
            'user_id' => $user->id,
        ]);
    }
}
