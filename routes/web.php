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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/test', 'DocumentController@test');

Route::get('/', 'HomeController@index')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');

// ENABLE IN PRODUCTION
// Route::get('/login', function(Request $request){
//     return view('templates.error')->with( 'error', 'Token empty! Please login from the DMS Application' );
// })->name('login');

// DISABLE IN PRODUCTION
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');

Route::get('/login/{token}', 'Auth\LoginController@loginForm');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

//Document
Route::get('/document/create', 'DocumentController@create');
Route::post('/document/create', 'DocumentController@store');
Route::get('/document/create/{category}', 'DocumentController@create');
Route::get('/document/create/{category}/{subcategory}', 'DocumentController@create');

Route::get('/document/file/{id}', 'DocumentController@showFile');

Route::get('/document/view/{id}', 'DocumentController@show');
Route::post('/document/view/{id}', 'DocumentController@update');

// Route::view('/document/search', 'document.search');
Route::get('/document/search', 'DocumentController@searchForm');
Route::post('/document/search', 'DocumentController@search');
Route::get('/document/reset', 'DocumentController@resetForm');
Route::get('/document/sort', 'DocumentController@sort');

Route::get('/document/print/{id}', 'DocumentController@print');

//Reference
Route::get('/reference/create', 'ReferenceController@index');
Route::get('/reference/create/{document}', 'ReferenceController@create');
Route::post('/reference/create', 'ReferenceController@store');

//Disha
Route::get('/disha', 'DishaController@index');
Route::get('/disha/{document}', 'DishaController@show');
Route::post('/disha/{document}', 'DishaController@update');

//Reports
Route::get('/reports', 'ReportsController@index');
Route::get('/reports/total/export', 'ReportsController@export');
Route::get('/reports/total', 'ReportsController@total');
Route::post('/reports/total', 'ReportsController@countTotal');
// Route::post('/reports/category', 'ReportsController@showTotal' );
Route::get('/reports/category/{category}', 'ReportsController@showPaginate');
Route::post('/reports/category/{category}', 'ReportsController@showTotal');

Route::get('/reports/audit', 'ReportsController@audit');
Route::get('/reports/audit/diary/{diary}', 'ReportsController@auditFilterbyDiary');
Route::get('/reports/audit/date/{start}/{end}', 'ReportsController@auditFilterbyDate');

//Users
Route::get('/users/online', 'UserController@online');
Route::resource('/user', 'UserController');

//Unlock
Route::get('/category/unlock', 'HomeController@categories');
Route::post('/category/unlock', 'HomeController@unlock');

//Exit
Route::get('/exit', 'HomeController@exit');