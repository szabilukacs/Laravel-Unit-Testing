<?php

namespace Tests\Unit\Controllers;

use App\Models\User;
use Tests\TestCase;

class AppstatusControllerTest extends TestCase
{
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    public function test_appstatus_cannot_access_by_anyone(): void
    {
        $this->get('appstatus')
            ->assertRedirect('/login');;
    }

    public function test_appstatus_can_access_by_user(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->get('appstatus');
        $response->assertSee('My Appstatuses');
    }

}
