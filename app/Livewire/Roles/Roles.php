<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    use WithPagination;
    public $searchText = '';

    public function render()
    {
        $query = Role::query();

        if (!empty($this->searchText)) {
            $query->where('name', 'like', '%' . $this->searchText . '%');
        }

        return view('livewire.roles.roles', [
            'roles' => $query->latest()->paginate(10)
        ]);
    }
}
