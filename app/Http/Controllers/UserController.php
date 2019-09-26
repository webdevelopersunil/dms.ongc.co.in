<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function online() {
        
        $users = User::all();

        return view('reports.users', compact('users')) ;
    }
}
