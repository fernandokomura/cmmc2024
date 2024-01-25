<?php

namespace Database\Factories\Helper;

use App\Models\Parlamentar;
use Symfony\Component\Uid\Uuid;

class FactoryHelper
{
    public static function getRandomModelId(string $model)
    {
        $count = $model::query()->count();
        if ($count === 0){
            return $model::factory()->create()->id;
        } else {
            return $model::inRandomOrder()->take(1)->first()->id;

            // return rand(1, $count);
        }
    }
}
