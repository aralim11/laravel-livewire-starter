<?php

namespace App\Livewire\Users;

use App\Livewire\Forms\UserForm;
use Livewire\Component;

class CreateUser extends Component
{

    public UserForm $form;

    public function createUser()
    {
        $this->form->store();

        return $this->redirect('/users', navigate: true);
    }

    public function render()
    {
        return view('livewire.users.create-user');
    }
}
