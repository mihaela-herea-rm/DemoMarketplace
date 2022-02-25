<?php

namespace App\Http\Livewire;

use App\Enums\UserRoles;
use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public $name;
    public $email;
    public $password;

    protected $rules = [
        'name' => ['required', 'max:255'],
        'email' => ['required', 'max:255', 'email', 'unique:users,email'],
        'password' => ['required', 'max:255', 'min:8'],
    ];

    public function submitUser()
    {
        $attributes = $this->validate();

        $attributes['name'] = $this->name;
        $attributes['email'] = $this->email;
        $attributes['password'] = $this->password;
        $attributes['role'] = UserRoles::USER;

        $user = User::create($attributes);

        auth()->login($user);

        $this->resetFields();

        return redirect('/')->with('success', 'Your account has been created');
    }

    private function resetFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }
    public function render()
    {
        return view('livewire.register');
    }
}
