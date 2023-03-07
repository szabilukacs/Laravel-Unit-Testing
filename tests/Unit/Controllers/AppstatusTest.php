<?php

namespace Tests\Unit\Controllers;

use App\Models\User;
use Tests\TestCase;

class AppstatusTest extends TestCase
{
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    public function test_appstatuses_cannot_access_by_anyone(): void
    {

        //$view = $this->view('appstatus.addProgram');
        // appstatus/addProgram/{id} - ez kell ide

        //$view->assertSee('E-Mail Address');
        //$view->assertSee('Password');
    }

    public function test_appstatuses_cannot_access_by_user(): void
    {
        // ezt meg megcsinalni
        // $view = $this->view('appstatus.addProgram');



    }

}
