<?php

namespace Tests\Unit\Models;

use App\Models\WorkSpace;
use App\Models\WorkSpaceInvitation;
use Tests\TestCase;

class WorkSpaceInvitationTest extends TestCase
{
    private WorkSpaceInvitation $invitation;

    protected function setUp(): void
    {
        parent::setUp();

        $this->invitation = WorkSpaceInvitation::factory()->create();
    }

    public function test_work_space_invitation_belongs_to_work_space()
    {
        $this->assertInstanceOf(WorkSpace::class, $this->invitation->workSpace);
    }
}
