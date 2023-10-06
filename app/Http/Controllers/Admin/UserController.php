<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Url;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }
}
