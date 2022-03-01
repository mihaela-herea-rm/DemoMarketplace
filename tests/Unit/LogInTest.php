<?php

namespace Tests\Unit;

use App\Http\Livewire\Login;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Livewire\Livewire;
use Tests\TestCase;

class LogInTest  extends TestCase
{
    use DatabaseTransactions;

    protected $user;

    /** @test */
    public function an_user_can_view_the_login_form()
    {
        $this->get('/login')->assertSeeLivewire('login');
    }

    /** @test */
    public function an_user_can_login()
    {
        $this->fakeUser();

        Livewire::test(Login::class)
            ->set('email', $this->user->email)
            ->set('password', $this->user->password)
            ->call('logUser')
            ->assertHasNoErrors(['email', 'password']);

        $this->actingAs($this->user);
        $this->assertAuthenticatedAs($this->user);
    }

    /** @test */
    public function an_user_cannot_login_without_a_password()
    {
        $this->fakeUser();

        Livewire::test(Login::class)
            ->set('email', $this->user->email)
            ->set('password', '')
            ->call('logUser')
            ->assertHasErrors(['password' => 'required']);

        $this->assertGuest();
    }

    /** @test */
    public function an_user_cannot_login_with_an_invalid_password()
    {
        $this->fakeUser();

        Livewire::test(Login::class)
            ->set('email', $this->user->email)
            ->set('password', 'dummy')
            ->call('logUser')
            ->assertHasErrors('login');

        $this->assertGuest();
    }

    /** @test */
    public function an_user_cannot_login_without_an_email()
    {
        $this->fakeUser();

        Livewire::test(Login::class)
            ->set('email', '')
            ->set('password', $this->user->password)
            ->call('logUser')
            ->assertHasErrors(['email' => 'required']);

        $this->assertGuest();
    }

    /** @test */
    public function an_user_cannot_login_with_an_invalid_email()
    {
        $this->fakeUser();

        Livewire::test(Login::class)
            ->set('email', 'dummy@email.com')
            ->set('password', $this->user->password)
            ->call('logUser')
            ->assertHasErrors('login');

        $this->assertGuest();
    }

    /** @test */
    public function a_logged_user_cannot_view_the_login_form()
    {
        $this->fakeUser();

        $this->actingAs($this->user)
            ->get('/login')
            ->assertRedirect('/');
    }

    protected function fakeUser()
    {
        $this->user = User::factory()->create([
            'email' => 'mihaela.herea+login@imobiliare.ro',
            'password' => bcrypt('mihaela123'),
        ]);
    }
}
