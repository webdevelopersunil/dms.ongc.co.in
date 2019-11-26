<?php

namespace App\Http\Controllers;

use App\Category;
use App\Document;
use App\Subcategory;
use App\Events\UserEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function test()
    {
        return Document::with('category')->where('category_id', 2)->limit(100)->get();
    }
}
