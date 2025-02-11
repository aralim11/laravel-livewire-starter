<?php

use App\Livewire\Users\CreateUser;
use App\Livewire\Users\UpdateUser;
use App\Livewire\Users\Users;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/users', Users::class)
    ->middleware(['auth'])
    ->name('users');

Route::get('/users-create', CreateUser::class)
    ->middleware(['auth'])
    ->name('users.create');

Route::get('/users-update/{id}', UpdateUser::class)
    ->middleware(['auth'])
    ->name('users.update');

require __DIR__ . '/auth.php';
