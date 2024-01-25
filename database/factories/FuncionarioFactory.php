<?php

namespace Database\Factories;

use App\Models\Setor;
use Database\Factories\Helper\FactoryHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Funcionario>
 */
class FuncionarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $setor_id = FactoryHelper::getRandomModelId(Setor::class);

        return [
            'nome' => fake()->name(),
            'rgf' => fake()->numerify('#####'),
            'setor_id' => $setor_id,
        ];
    }
}
