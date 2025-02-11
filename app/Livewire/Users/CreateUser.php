<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;

class CreateUser extends Component
{

    #[Validate(('required|string|min:3'))]
    public $name;

    #[Validate(('required|email|unique:users,email'))]
    public $email;

    public function createUser()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make('password'),
        ]);

        session()->flash('message', 'User created successfully!');

        $this->name = '';
        $this->email = '';
    }

    public function render()
    {
        return view('livewire.users.create-user');
    }
}
