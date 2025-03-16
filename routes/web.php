<?php

use App\Livewire\LanguageSwitcher;
use App\Livewire\Roles\Roles;
use App\Livewire\Users\CreateUser;
use App\Livewire\Users\UpdateUser;
use App\Livewire\Users\Users;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware(['locale', 'auth'])->group(function () {
    ## dashboard
    Route::view('dashboard', 'dashboard')->middleware(['verified'])->name('dashboard');

    ## user
    Route::get('/users', Users::class)->name('users.index');
    Route::get('/users-create', CreateUser::class)->middleware(['can:users.create'])->name('users.create');
    Route::get('/users-update/{id}', UpdateUser::class)->middleware(['can:users.update'])->name('users.update');

    ## roles
    Route::get('/roles', Roles::class)->middleware(['can:roles.index'])->name('roles.index');

    ## profile
    Route::view('profile', 'profile')->name('profile');

    ## localization
    Route::get('/localization/{locale}', LanguageSwitcher::class)->name('localization');
});

require __DIR__ . '/auth.php';
