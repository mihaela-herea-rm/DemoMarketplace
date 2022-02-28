<?php

namespace App\Http\Livewire;

use App\Enums\UserRoles;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => ['required', 'email'],
        'password' => ['required'],
    ];

    public function logUser()
    {
        $this->validate();
        $attributes['email'] = $this->email;
        $attributes['password'] = $this->password;

        if (!auth()->attempt($attributes)) {
            throw ValidationException::withMessages(['login' => 'Invalid credentials!']);
        }
        $this->resetFields();
        session()->regenerate();
        return redirect('/')->with('success', 'Welcome back!');
    }

    private function resetFields()
    {
        $this->email = '';
        $this->password = '';
    }

    public function render()
    {
        return view('livewire.login');
    }
}
