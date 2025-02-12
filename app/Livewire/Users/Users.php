<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{

    use WithPagination;
    public $searchText = '';

    public function deleteUser(User $user)
    {
        $user->delete();
        if ($user) {
            $user->delete();
            session()->flash('message', 'User deleted successfully!');
        }
    }


    public function render()
    {
        $query = User::query();

        if (!empty($this->searchText)) {
            $query->where('name', 'like', '%' . $this->searchText . '%')
                ->orWhere('email', 'like', '%' . $this->searchText . '%');
        }

        return view('livewire.users.users', [
            'users' => $query->latest()->paginate(10)
        ]);
    }
}
