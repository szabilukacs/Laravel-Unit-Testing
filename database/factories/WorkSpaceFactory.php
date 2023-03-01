<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkSpace>
 */
class WorkSpaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'company_name' => $this->faker->company,
            'company_address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->safeEmail,
            'logo_path' => $this->faker->filePath(),
            'instagram' => $this->faker->url,
            'facebook' => $this->faker->url,
            'linkedin' => $this->faker->url,
            'twitter' => $this->faker->url,
            'webpage' => $this->faker->url,
        ];
    }
}
