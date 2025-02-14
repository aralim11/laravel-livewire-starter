<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageSwitcher extends Component
{
    public function mount($locale)
    {
        ## Set the application locale
        App::setLocale($locale);

        ## Store the selected locale in the session
        Session::put('locale', $locale);

        ## Redirect back to the previous page
        return redirect()->to(url()->previous());
    }
}
