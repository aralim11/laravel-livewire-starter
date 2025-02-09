<?php

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

require __DIR__ . '/auth.php';
