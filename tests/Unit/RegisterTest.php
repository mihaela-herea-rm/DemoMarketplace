<?php

namespace Tests\Unit;

use App\Http\Livewire\Register;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Livewire\Livewire;
use Tests\TestCase;

class RegisterTest  extends TestCase
{
    use DatabaseTransactions;

    /** @test*/
    public function register_page_contain_livewire_component()
    {
        $this->get('/register')->assertSeeLivewire('register');
    }

    /** @test */
    public function an_user_can_create_an_account_with_valid_data()
    {
        Livewire::test(Register::class)
            ->set('name', 'Mihaela Test')
            ->set('email', 'mihaela.register@gmail.com')
            ->set('password', 'mihaelatest')
            ->call('submitUser');

        $this->assertDatabaseHas('users', [
            'email' => 'mihaela.register@gmail.com'
        ]);
    }

    /** @test */
    public function an_user_cannot_create_an_account_with_an_existing_email()
    {
        $this->assertDatabaseMissing('users', [
            'email' => 'mihaela.register@gmail.com'
        ]);

        Livewire::test(Register::class)
            ->set('name', 'Mihaela Test')
            ->set('email', 'mihaela.register@gmail.com')
            ->set('password', 'mihaelatest')
            ->call('submitUser');

        $this->assertDatabaseHas('users', [
            'email' => 'mihaela.register@gmail.com'
        ]);

        Livewire::test(Register::class)
            ->set('name', 'Mihaela Test 2')
            ->set('email', 'mihaela.register@gmail.com')
            ->set('password', 'mihaelatest')
            ->call('submitUser')
            ->assertHasErrors('email');
    }

    /** @test */
    public function after_register_is_redirected_to_homepage()
    {
        Livewire::test(Register::class)
            ->set('name', 'Mihaela Test')
            ->set('email', 'mihaela.register@gmail.com')
            ->set('password', 'mihaelatest')
            ->call('submitUser')
            ->assertRedirect('/');
    }

    /** @test */
    public function an_user_cannot_register_with_an_invalid_email()
    {
        Livewire::test(Register::class)
            ->set('name', 'Mihaela Test')
            ->set('email', 'mihaela.register')
            ->set('password', 'mihaelatest')
            ->call('submitUser')
            ->assertHasErrors('email');
    }

    /** @test */
    public function an_user_cannot_register_with_an_invalid_password()
    {
        Livewire::test(Register::class)
            ->set('name', 'Mihaela Test')
            ->set('email', 'mihaela.register@gmail.com')
            ->set('password', 'mihaela')
            ->call('submitUser')
            ->assertHasErrors('password');
    }

    /** @test */
    public function an_user_cannot_register_without_a_name()
    {
        Livewire::test(Register::class)
            ->set('name', '')
            ->set('email', 'mihaela.register@gmail.com')
            ->set('password', 'mihaela')
            ->call('submitUser')
            ->assertHasErrors('name');
    }

    /** @test */
    public function an_user_cannot_register_without_a_password()
    {
        Livewire::test(Register::class)
            ->set('name', 'Mihaela Test')
            ->set('email', 'mihaela.register@gmail.com')
            ->set('password', '')
            ->call('submitUser')
            ->assertHasErrors('password');
    }

    /** @test */
    public function an_user_cannot_register_without_an_email()
    {
        Livewire::test(Register::class)
            ->set('name', 'Mihaela Test')
            ->set('email', '')
            ->set('password', 'mihaela')
            ->call('submitUser')
            ->assertHasErrors('email');
    }

    /** @test */
    public function an_user_cannot_register_with_empty_fields()
    {
        Livewire::test(Register::class)
            ->set('name', '')
            ->set('email', '')
            ->set('password', '')
            ->call('submitUser')
            ->assertHasErrors(['name', 'email', 'password']);
    }

    /** @test */
    public function an_user_is_logged_in_after_registration()
    {
        Livewire::test(Register::class)
            ->set('name', 'Mihaela Test')
            ->set('email', 'mihaela.register@gmail.com')
            ->set('password', 'mihaelatest')
            ->call('submitUser');

        $this->assertAuthenticated();
    }
}
