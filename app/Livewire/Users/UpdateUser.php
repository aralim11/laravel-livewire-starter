<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class UpdateUser extends Component
{
    public $name;
    public $email;
    public $userId;

    public function mount($id)
    {
        // Fetch user by ID
        $user = User::find($id);
        if ($user) {
            $this->name = $user->name;
            $this->email = $user->email;
            $this->userId = $user->id;
        }
    }

    public function updateUser()
    {
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $this->userId,
        ]);

        $user = User::findOrFail($this->userId);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        session()->flash('message', 'User updated successfully.');
    }

    public function render()
    {
        return view('livewire.users.update-user');
    }
}
