<?php

namespace Tests\Unit\Controllers;

use App\Models\User;
use App\Models\WorkSpace;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class WorkspaceControllerTest extends TestCase
{

    public function test_workspace_cannot_access_by_anyone(): void
    {
        $this->get('workspace')
            ->assertRedirect('/login');
    }

    public function test_workspace_can_access_by_user(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->get('workspace');
        $response->assertSee('My Workspaces');
    }

    public function test_workspace_can_render_create_view(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->get('workspace/create');
        $response->assertSee('Create a new workspace');
    }

    public function test_workspace_can_show_index_workspace(): void
    {
        $user = User::factory()->create();
        $workSpace = WorkSpace::factory()->create([
            'company_name' => 'Test workspace'
        ]);
        // Add a workspace to this user
        DB::table('user_work_space')
            ->insert([
                'user_id' => $user->id,
                'work_space_id' => $workSpace->id,
            ]);
        $response = $this->actingAs($user)
            ->get('workspace', [
                'id' => $user->getKey()
            ]);
        $response->assertSee('Test workspace');
    }

    public function test_workspace_can_create_a_workspace(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->post('workspace', [
                'name' => 'Test comp.name',
                'address' => 'Str. Bolcsescu 56',
                'phone' => '46587',
                'email' => 'asd@gmail.com',
                'instagram' => 'testinsta',
                'facebook' => 'tesfb'
            ]);
        $response->assertRedirect('/workspace');
        $this->assertDatabaseHas('work_spaces', [
            'company_name' => 'Test comp.name',
            'company_address' => 'Str. Bolcsescu 56',
            'phone' => '46587',
            'email' => 'asd@gmail.com',
            'instagram' => 'testinsta',
            'facebook' => 'tesfb'
        ]);
    }

    public function test_workspace_can_show_a_workspace(): void
    {
        $user = User::factory()->create();
        $workSpace = WorkSpace::factory()->create([
            'id' => 17,
            'company_name' => 'Test workspace1',
            'email' => 'test_email',
        ]);
        // Add a workspace to this user
        DB::table('user_work_space')
            ->insert([
                'user_id' => $user->id,
                'work_space_id' => $workSpace->id,
            ]);
        $response = $this->actingAs($user)
            ->get('workspace/17', [
                'id' => $user->getKey()
            ]);
        $response->assertSee('Test workspace1');
        $response->assertSee('test_email');

    }

    // TODO
    /*
    public function test_workspace_invitations_function(): void
    {

    }
    */

    public function test_workspace_edit(): void
    {
        $user = User::factory()->create();
        $workSpace = WorkSpace::factory()->create([
            'id' => 15,
            'company_name' => 'Test workspace Edit fcn',
            'email' => 'test_email',
        ]);
        // Add a workspace to this user
        DB::table('user_work_space')
            ->insert([
                'user_id' => $user->id,
                'work_space_id' => $workSpace->id,
            ]);
        $response = $this->actingAs($user)
            ->get('workspace/15/edit', [
                'id' => $user->getKey()
            ]);
        $response->assertSee('Edit the workspace');
        $response->assertSee($workSpace->company_name);
    }

    public function test_workspace_update(): void
    {
        $user = User::factory()->create();
        $workSpace = WorkSpace::factory()->create([
            'id' => 12,
            'company_name' => 'Test workspace Update fcn',
            'email' => 'test_email',
        ]);
        // Add a workspace to this user
        DB::table('user_work_space')
            ->insert([
                'user_id' => $user->id,
                'work_space_id' => $workSpace->id,
            ]);

        $response = $this->actingAs($user)
            ->put('workspace/12', [
                'name' => 'Test comp.name - megvaltoztatva',
                'address' => 'Str. Bolcsescu 49',
                'phone' => '46587',
                'email' => 'asd@gmail.com',
                'instagram' => 'testinsta',
                'facebook' => 'tesfb',
                'id' => $workSpace->id,
            ]);
        $response->assertRedirect('/workspace');
        $this->assertDatabaseHas('work_spaces', [
            'company_name' => 'Test comp.name - megvaltoztatva',
            'company_address' => 'Str. Bolcsescu 49',
            'phone' => '46587',
            'email' => 'asd@gmail.com',
            'instagram' => 'testinsta',
            'facebook' => 'tesfb'
        ]);
    }

    public function test_workspace_destroy(): void
    {
        $user = User::factory()->create();
        $workSpace = WorkSpace::factory()->create([
            'id' => 15,
            'company_name' => 'Test workspace Delete fcn',
            'email' => 'test_email',
        ]);
        // Add a workspace to this user
        DB::table('user_work_space')
            ->insert([
                'user_id' => $user->id,
                'work_space_id' => $workSpace->id,
            ]);

        $response = $this->actingAs($user)
            ->delete('workspace/15', [
                'id' => $user->getKey()
            ]);
        $this->assertDatabaseMissing('work_spaces', [
            'company_name' => 'Test workspace Delete fcn'
        ]);
        $response->assertRedirect('/workspace');

    }


}
