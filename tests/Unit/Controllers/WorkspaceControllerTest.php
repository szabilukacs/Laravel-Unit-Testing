<?php

namespace Tests\Unit\Controllers;

use App\Models\User;
use App\Models\WorkSpace;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class WorkspaceControllerTest extends TestCase
{

    public function test_workspace_cannot_access_by_anyone(): void
    {
        $this->get('workspace')
            ->assertRedirect('/login');;
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

    public function test_workspace_can_show_workspace(): void
    {
        $user = User::factory()->create();
        // Add a workspace to this user
        DB::table('user_work_space')
            ->insert([
                'user_id' => $user->id,
                // itt ez nem helyes
                'work_space_id' => WorkSpace::factory()->create([
                    'company_name ' =>'Test workspace'
                ])->getKey(),
            ]);
        $response = $this->actingAs($user)
            ->get('workspace',[
                'id' => $user->getKey()
            ]);
        $response->assertSee('Test workspace');
    }

}
