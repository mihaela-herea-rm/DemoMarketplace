<?php

namespace Tests\Unit;

use App\Enums\UserRoles;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class AdminTest  extends TestCase
{
    use DatabaseTransactions;

    protected $user;

    protected function fakeUser()
    {
        $this->user = User::factory()->create([
            'email' => 'mihaela.herea+admin@imobiliare.ro',
            'password' => bcrypt('mihaela123'),
            'role' => UserRoles::ADMIN,
        ]);
    }

    /** @test */
    public function correct_view_loaded()
    {
        $this->fakeUser();
        $this->actingAs($this->user);
        $response = $this->get('/user/profile/' . $this->user->id);
        $response->assertViewIs('admin.profile.index');
    }

    /** @test */
    public function an_admin_can_only_view_own_profile_page()
    {
        $this->fakeUser();
        $this->actingAs($this->user);
        $response = $this->get('/user/profile/1');
        $response->assertRedirect('/user/profile/' . $this->user->id);
    }

    /** @test */
    public function an_admin_can_view_the_service_list()
    {
        $this->fakeUser();
        $this->actingAs($this->user);
        $response = $this->get('/admin/services');
        $response->assertOk();
    }

    /** @test */
    public function an_admin_can_view_service_add_form()
    {
        $this->fakeUser();
        $this->actingAs($this->user);
        $response = $this->get('/admin/services/create');
        $response->assertOk();
    }


    /** @test */
    public function an_admin_can_add_a_new_service()
    {
        $this->fakeUser();
        $this->actingAs($this->user);
        $response = $this->get('/admin/services/create');
        $response->assertOk();
    }
}
