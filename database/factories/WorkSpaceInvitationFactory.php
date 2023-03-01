<?php

namespace Database\Factories;

use App\Models\WorkSpace;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkSpaceInvitation>
 */
class WorkSpaceInvitationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $status = [
            'Sent',
            'Accepted',
            'Rejected',
        ];
        return [
            'work_space_id' => WorkSpace::factory(),
            'email' => $this->faker->email,
            'status' => Arr::random($status),
        ];
    }
}
