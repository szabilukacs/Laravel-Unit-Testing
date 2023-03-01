<?php

namespace Database\Seeders;

use App\Models\WorkSpace;
use App\Models\WorkSpaceInvitation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkSpaceInvitationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WorkSpaceInvitation::factory()
            ->has(WorkSpace::factory()->count(3))
            ->count(2)
            ->create();
    }
}
