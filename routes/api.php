<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/token', function(Request $request){
    
    $entry = \App\Mac::where('hashed_mac', $request->hashed_mac )->first();
    $entry->token = $request->token;
    $entry->save();

    return 'success';
});

Route::get('/mac', function(Request $request){
    return \App\Mac::all()->pluck('hashed_mac');
});
