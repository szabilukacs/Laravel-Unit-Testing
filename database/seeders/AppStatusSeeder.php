<?php

namespace Database\Seeders;

use App\Models\AppStatus;
use App\Models\Program;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AppStatus::factory()
            ->has(Program::factory()->count(2))
            ->create();
    }
}
