<?php

use App\Livewire\Roles\Roles;
use App\Livewire\Users\Users;
use App\Livewire\LanguageSwitcher;
use App\Livewire\Users\CreateUser;
use App\Livewire\Users\UpdateUser;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Broadcast;


Route::view('/', 'welcome');

Route::middleware(['locale', 'auth'])->group(function () {
    ## dashboard
    Route::view('dashboard', 'dashboard')->middleware(['verified'])->name('dashboard');

    ## user
    Route::get('/users', Users::class)->name('users.index');
    Route::get('/users-create', CreateUser::class)->name('users.create');
    Route::get('/users-update/{id}', UpdateUser::class)->name('users.update');

    ## roles
    Route::get('/roles', Roles::class)->name('roles.index');

    ## profile
    Route::view('profile', 'profile')->name('profile');

    ## localization
    Route::get('/localization/{locale}', LanguageSwitcher::class)->name('localization');
});

require __DIR__ . '/auth.php';
