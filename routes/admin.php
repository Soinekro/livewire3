<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Livewire\Admin\Panel\Dashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', Dashboard::class)->name('admin.dashboard');
Route::get('/roles', [RoleController::class, 'index'])->name('admin.roles.index');
Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
