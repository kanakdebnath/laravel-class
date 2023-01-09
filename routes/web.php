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

Route::get('/' , 'App\Http\Controllers\HomeController@index');
Route::get('/home' , 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/about' , 'App\Http\Controllers\HomeController@about')->name('about');
Route::get('/contact' , 'App\Http\Controllers\HomeController@contact')->name('contact');
Route::post('/contact-submit' , 'App\Http\Controllers\HomeController@contact_submit');


Route::get('/about/about-sub', function () {
    return view('abc.about');
});


Route::get('/about/sjdgjf/sdjjfh/sdjgfj', function(){
    return view('abc.about');
});



Route::get('/user', function(){
    return view('user');
})->name('user');
