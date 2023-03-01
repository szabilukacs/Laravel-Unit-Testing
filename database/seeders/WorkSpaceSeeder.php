<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\WorkSpace;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkSpaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WorkSpace::factory()
            ->has(User::factory()->count(3))
            ->count(3)
            ->create();
    }
}
