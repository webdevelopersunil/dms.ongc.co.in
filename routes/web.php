<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// ENABLE IN PRODUCTION
// Route::get('/login', function(Request $request){
//     return view('templates.error')->with( 'error', 'Token empty! Please login from the DMS Application' );
// })->name('login');

// DISABLE IN PRODUCTION
Route::get('/login','Auth\LoginController@showLoginForm')->name('login');

Route::get('/login/{token}','Auth\LoginController@loginForm');
Route::post('/login','Auth\LoginController@login');
Route::post('/logout','Auth\LoginController@logout')->name('logout');

//Document
Route::get('/document/create', 'DocumentController@empty');
Route::post('/document/create', 'DocumentController@store');
Route::get('/document/create/{category}/{subcategory}', 'DocumentController@create' );

Route::view('/document/search', 'document.search');
Route::post('/document/search', 'DocumentController@search');