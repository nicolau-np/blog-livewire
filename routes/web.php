<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', "home")->name('home');
Route::livewire('/login', "login")->name('login');
Route::livewire('/register', "register");