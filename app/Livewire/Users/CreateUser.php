<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Component
{

    public $name;
    public $email;

    public function createUser()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

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
