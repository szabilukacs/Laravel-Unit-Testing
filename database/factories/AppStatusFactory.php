<?php

namespace Database\Factories;

use App\Models\WorkSpace;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AppStatus>
 */
class AppStatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'work_space_id' => WorkSpace::factory(),
            'name' => $this->faker->firstName,
            'description' => $this->faker->text,
            'logo_path' => $this->faker->filePath(),
            'is_visible' => $this->faker->boolean,
        ];
    }
}
