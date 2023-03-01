<?php

namespace Database\Factories;

use App\Models\AppStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Program>
 */
class ProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $status = [
            'Available',
            'Service information',
            'Service disruption',
            'Service outage',
        ];
        return [
            'app_status_id' => AppStatus::factory(),
            'name' => $this->faker->firstName,
            'description' => $this->faker->text,
            'status' => Arr::random($status),
        ];
    }
}
