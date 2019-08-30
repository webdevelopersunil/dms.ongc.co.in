<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function online() {
        
        $users = User::where('is_online', true)->get();

        return view('reports.users', compact('users')) ;
    }
}
