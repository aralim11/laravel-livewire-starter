<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{

    use WithPagination;
    public $searchText = '';
    public $users = [];

    public function deleteUser($userId)
    {
        $user = User::find($userId);
        if ($user) {
            $user->delete();
            session()->flash('message', 'User deleted successfully!');
        }
    }

    public function updatedSearchText()
    {
        $this->resetPage();

        $this->users = User::latest()->Paginate(5);

        // if (!empty($this->searchText)) {
        //     $query->where('name', 'like', '%' . $this->searchText . '%')
        //         ->orWhere('email', 'like', '%' . $this->searchText . '%');
        // }
    }

    public function render()
    {
        // $query = User::query();

        // if (!empty($this->searchText)) {
        //     $query->where('name', 'like', '%' . $this->searchText . '%')
        //         ->orWhere('email', 'like', '%' . $this->searchText . '%');
        // }

        return view('livewire.users.users');
    }
}
