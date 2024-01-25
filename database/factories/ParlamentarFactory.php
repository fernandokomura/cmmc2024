<?php

namespace Database\Factories;

use App\Models\PartidoPolitico;
use Carbon\Carbon;
use Database\Factories\Helper\FactoryHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Parlamentar>
 */
class ParlamentarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $partido_id = FactoryHelper::getRandomModelId(PartidoPolitico::class);

        return [
            'nome' => fake()->name(),
            'nome_politico' => fake()->name(),
            'data_nascimento' => Carbon::parse(fake()->date()),
            'suplente' => false,
            'formacao' => fake()->jobTitle(),
            'nivel_intrucao' => fake()->numberBetween(0,11),
            'partido_id' => $partido_id,
            'ativo' => true,
        ];
    }
}
