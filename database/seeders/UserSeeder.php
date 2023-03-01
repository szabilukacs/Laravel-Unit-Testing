<?php

namespace Database\Seeders;

use App\Models\AppStatus;
use App\Models\Program;
use App\Models\User;
use App\Models\WorkSpace;
use App\Models\WorkSpaceInvitation;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->has(WorkSpace::factory()
                ->has(AppStatus::factory()->count(2)
                ->has(Program::factory()->count(5)))
                ->count(2)
            ->has(WorkSpaceInvitation::factory()->count(2)))
            ->create([
                'name' => 'support',
                'email' => 'supportuser@webapix.hu',
            ]);
        User::factory()
            ->count(3)
            ->create();
    }
}
