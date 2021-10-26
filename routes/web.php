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

Route::get('LogOut','studentController@logOut')->middleware('checkLogin');;








/*
get 
post 
put 
patch 
delete


=========
view
*/