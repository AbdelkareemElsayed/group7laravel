<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});




Route::get('Message/{id}/{name?}',function ($id,$name = "Vistor"){
    echo 'welcome  '.$name.' Your Id :'.$id ;
})->where(['id' => '[0-9]+', 'name'=>'[a-z]+']);


// Route::get('Create',function (){
//     return  view('register');
// });


// Route::view('Create', 'register');

// Route::post('save',function (){
//     echo 'Form Data';
// });




# Controller   
Route::get('Create','studentController@create');
Route::post('save','studentController@store');
Route::get('profile','studentController@studentProfile');
Route::get('Display','studentController@display')->middleware('checkLogin');
Route::get('Edit/{id}','studentController@edit')->where(['id' => '[0-9]+'])->middleware('checkLogin');
Route::post('Update','studentController@update')->middleware('checkLogin');;
Route::get('Remove/{id}','studentController@remove')->where(['id' => '[0-9]+'])->middleware('checkLogin');


Route::get('Login','studentController@GetLoginView');
Route::post('DoLogin','studentController@Login');
Route::get('LogOut','studentController@logOut')->middleware('checkLogin');


Route::get('Admins/Login','adminsController@LoginView');
Route::post('Admins/doLogin','adminsController@login');
Route::get('Admins/LogOut','adminsController@LogOut')->middleware('adminCheck');

Route::resource('Admins', 'adminsController');
//->middleware('adminCheck');

// Admins           GET         Route::get('Admins', 'adminsController@index');
// Admins/create    GET         Route::get('Admins/create', 'adminsController@create');
// Admins           POST        Route::post('Admins', 'adminsController@store');
// Admins/{id}/edit GET         Route::get('Admins/{id}/edit', 'adminsController@edit');
// Admins/{id}      PUT         Route::put('Admins/{id}', 'adminsController@update');
// Admins/{id}      DELETE      Route::delete('Admins/{id}', 'adminsController@destroy');
// Admins/{id}      GET         Route::get('Admins/{id}', 'adminsController@show');
 


/*
get 
post 
put 
patch 
delete


=========
view
*/