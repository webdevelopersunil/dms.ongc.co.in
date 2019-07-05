<?php

use App\Document;
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

Route::get('categories', function(Request $request){

    $categories = [

    ];

    return $categories;
});

Route::get('/disha/insert', function (Request $request) {

    $diary_no = DB::table('auto_increment')->where('category', 'disha_file' )->first()->counter + 1;

    Document::create([
        'category' => 'disha_file',
        'diary_no' => $diary_no,
        'date_in' => '2019-06-01',
        'file_date' => '2019-01-01',
        'file_no' => 'DEL/CIS/DISHA/API',
        'received_from' => 'Head IT',
        'subject' => 'Disha API'
    ]);

    DB::table('auto_increment')->where('category', 'disha_file' )->increment('counter');

    return ['status' => 'success'];

});