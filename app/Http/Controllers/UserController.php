<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['interests', 'roles'])->get();

        return view('users', compact('users'));
    }
    
}
