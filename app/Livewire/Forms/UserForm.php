<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\User;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;

class UserForm extends Form
{
    #[Validate(('required|string|min:3'))]
    public $name = '';

    #[Validate(('required|email|unique:users,email'))]
    public $email = '';

    public function store()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make('12345678'),
        ]);
    }
}
