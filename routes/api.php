<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::apiresource('Blog','api\BlogController');



// Blog           GET         Route::get('Admins', 'adminsController@index');
// Blog           POST        Route::post('Admins', 'adminsController@store');
// Blog/{id}      PUT         Route::put('Admins/{id}', 'adminsController@update');
// Blog/{id}      DELETE      Route::delete('Admins/{id}', 'adminsController@destroy');
 



// Route::get('Blog','api\blogController@index');
// Route::post('Blog/create','api\blogController@store');
// Route::post('Blog/update/{id}','api\blogController@update');
// Route::post('Blog/delete/{id}','api\blogController@destroy');












Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
