<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Traits\Notifications;
use App\Livewire\Forms\UserForm;
use App\Events\NotificationEvent;

class CreateUser extends Component
{

    use Notifications;
    public UserForm $form;

    public function createUser()
    {
        ## store user
        $this->form->store();

        ## show alert
        $this->showNotification(
            'Welcome!',
            'User Create Successfully.',
            'info'
        );

        ## broadcast event notification
        event(new NotificationEvent(auth()->user()->id));

        ## reset form
        $this->reset();
    }

    public function render()
    {
        return view('livewire.users.create-user');
    }
}
