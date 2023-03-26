<?php

namespace Tests\Unit\Models;

use App\Models\AppStatus;
use App\Models\Program;
use App\Models\WorkSpace;
use Tests\TestCase;

class AppStatusTest extends TestCase
{
    /**
     * @var \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|mixed
     */
    private AppStatus $appstatus;

    protected function setUp(): void
    {
        parent::setUp();

        $this->appstatus = AppStatus::factory()->create();
    }

    public function test_appstatutes_belongs_to_workspace()
    {
        $this->assertInstanceOf(WorkSpace::class, $this->appstatus->workSpace);
    }

    public function test_appStatues_has_many_programs()
    {
        Program::factory()
            ->for($this->appstatus)
            ->create();
        $this->assertInstanceOf(Program::class, $this->appstatus->programs()->first());
    }
}
