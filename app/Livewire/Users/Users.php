<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{

    use WithPagination;
    public $searchText = '';
    public $title;
    public $add_user_btn;
    public $id;
    public $name;
    public $email;
    public $action;
    public $edit_title;
    public $delete_title;
    public $search_title;

    public function mount()
    {
        ## Get translation string
        $this->title = __('user.title');
        $this->add_user_btn = __('user.add_user_btn');
        $this->id = __('user.table.id');
        $this->name = __('user.table.name');
        $this->email = __('user.table.email');
        $this->action = __('user.table.action');
        $this->edit_title = __('user.table.edit_title');
        $this->delete_title = __('user.table.delete_title');
        $this->search_title = __('user.table.search_title');
    }

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
