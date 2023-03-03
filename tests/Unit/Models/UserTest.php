<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\WorkSpace;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class UserTest extends TestCase
{
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    public function test_user_belongs_to_many_work_space()
    {
        DB::table('user_work_space')
            ->insert([
                'user_id' => $this->user->id,
                'work_space_id' => WorkSpace::factory()->create()->getKey(),
            ]);
        $this->assertInstanceOf(WorkSpace::class, $this->user->workspace->first());
    }
}
