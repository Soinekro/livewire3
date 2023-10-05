<?php

use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ RoleController::class, 'index' ])->name('admin.roles.index');
