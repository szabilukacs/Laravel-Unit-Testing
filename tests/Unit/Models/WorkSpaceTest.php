<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\WorkSpace;
use App\Models\WorkSpaceInvitation;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class WorkSpaceTest extends TestCase
{
    private WorkSpace $workSpace;

    protected function setUp(): void
    {
        parent::setUp();

        $this->workSpace = WorkSpace::factory()->create();
    }

    public function test_work_space_belongs_to_many_user()
    {
        DB::table('user_work_space')
            ->insert([
                'user_id' => User::factory()->create()->getKey(),
                'work_space_id' => $this->workSpace->id,
            ]);
        $this->assertInstanceOf(User::class, $this->workSpace->users->first());
    }

    public function test_work_space_has_many_invitations()
    {
        WorkSpaceInvitation::factory()
            ->for($this->workSpace)
            ->create();
        $this->assertInstanceOf(WorkSpaceInvitation::class, $this->workSpace->workSpaceInvitation->first());
    }
}
