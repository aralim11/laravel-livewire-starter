<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{

    use WithPagination;

    public function render()
    {
        return view('livewire.users.users', [
            'users' => User::latest()->paginate(10)
        ]);
    }
}
