<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function online() {
        return User::where('is_online', true)->get();
    }
}
