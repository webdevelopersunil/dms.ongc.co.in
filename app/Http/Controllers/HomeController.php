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

    public function categories() {

        $categories = Category::all();

        return view('unlock.index', compact('categories'));
    }

    public function unlock(Request $request) {

        $category = Category::find($request->category);

        $category->cm_IsInUse = false;
        $category->cm_UsedBy = '';
        $category->save();

        return redirect()->back()->with('success', 'Category Unlocked!');
    }

    public function exit(Request $request) {
        $input = $request->input('category');
        $category = Category::find($input);

        $category->cm_IsInUse = false;
        $category->cm_UsedBy = '';
        $category->save();

        return redirect('/home');
    }
}
