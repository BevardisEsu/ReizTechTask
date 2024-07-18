<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    protected $model = Job::class;

    public function definition()
    {
        return [
            'urls' => json_encode([$this->faker->url]),
            'selectors' => json_encode(['body']),
            'scraped_data' => null,
            'status' => 'pending',
        ];
    }
}
