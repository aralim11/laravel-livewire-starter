<?php

namespace App\Livewire\Users;

use App\Livewire\Forms\UserForm;
use App\Traits\Notifications;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class CreateUser extends Component
{

    use Notifications;
    public UserForm $form;

    public function createUser()
    {
        $this->form->store();

        ## show alert
        $this->showNotification(
            'Welcome!',
            'User Create Successfully.',
            'info'
        );


        $this->reset();
    }

    public function render()
    {
        return view('livewire.users.create-user');
    }
}
