<?php

namespace Tests\Unit\Controllers;

use App\Models\AppStatus;
use App\Models\User;
use App\Models\WorkSpace;
use Illuminate\Support\Facades\DB;
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
            ->assertRedirect('/login');
    }

    public function test_appstatus_can_access_by_user(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->get('appstatus');
        $response->assertSee('My Appstatuses');
    }

    public function test_appstatus_can_show_an_appstatus(): void
    {
        $user = User::factory()->create();
        $this->workSpace = WorkSpace::factory()->create();
        // Add this workspace to this user
        DB::table('user_work_space')
            ->insert([
                'user_id' => $user->id,
                'work_space_id' => $this->workSpace->id,
            ]);
        $appstatus = AppStatus::factory()
            ->for($this->workSpace)
            ->create([
                'name' => 'Test appstatus name',
                'id' => 10
            ]);
        $response = $this->actingAs($user)
            ->get('appstatus/10');
        $response->assertSee('Test appstatus name');
    }

    public function test_appstatus_can_show_an_edit_page(): void
    {
        $user = User::factory()->create();
        $this->workSpace = WorkSpace::factory()->create();
        // Add this workspace to this user
        DB::table('user_work_space')
            ->insert([
                'user_id' => $user->id,
                'work_space_id' => $this->workSpace->id,
            ]);
        $appstatus = AppStatus::factory()
            ->for($this->workSpace)
            ->create([
                'name' => 'Test appstatus name edited',
                'id' => 10
            ]);
        $response = $this->actingAs($user)
            ->get('appstatus/10/edit');
        $response->assertSee($appstatus->name);
    }

    public function test_appstatus_update_function(): void
    {
        $user = User::factory()->create();
        $this->workSpace = WorkSpace::factory()->create();
        // Add this workspace to this user
        DB::table('user_work_space')
            ->insert([
                'user_id' => $user->id,
                'work_space_id' => $this->workSpace->id,
            ]);
        $appstatus = AppStatus::factory()
            ->for($this->workSpace)
            ->create([
                'name' => 'Test appstatus name update',
                'id' => 10
            ]);

        $response = $this->actingAs($user)
            ->put('appstatus/10', [
                'name' => 'Test comp.name - megvaltoztatva',
                'description' => 'Str. Bolcsescu 49',
                'logo_path' => 'c:users/blabla/asd.jpg',
            ]);
        $response->assertRedirect('/appstatus/10');

    }

    public function test_appstatus_add_program_function(): void
    {
        $user = User::factory()->create();
        $this->workSpace = WorkSpace::factory()->create();
        // Add this workspace to this user
        DB::table('user_work_space')
            ->insert([
                'user_id' => $user->id,
                'work_space_id' => $this->workSpace->id,
            ]);
        $appstatus = AppStatus::factory()
            ->for($this->workSpace)
            ->create([
                'name' => 'Test appstatus name update',
                'id' => 15
            ]);

        $response = $this->actingAs($user)
            ->post('appstatus/addProgram/15', [
                'name' => 'Test comp.name add new',
                'description' => 'Str. Bolcsescu 49',
                'id' => 15,
            ]);
        $response->assertRedirect('/appstatus/15');
    }

    public function test_appstatus_destroy_function(): void
    {
        $user = User::factory()->create();
        $this->workSpace = WorkSpace::factory()->create();
        // Add this workspace to this user
        DB::table('user_work_space')
            ->insert([
                'user_id' => $user->id,
                'work_space_id' => $this->workSpace->id,
            ]);
        $appstatus = AppStatus::factory()
            ->for($this->workSpace)
            ->create([
                'name' => 'Test app Delete fcn',
                'id' => 15
            ]);

        $response = $this->actingAs($user)
            ->delete('appstatus/15', [
                'id' => 15,
            ]);
        $response->assertRedirect('/appstatus');
        $this->assertDatabaseMissing('app_statuses', [
            'name' => 'Test app Delete fcn'
        ]);
    }


}
