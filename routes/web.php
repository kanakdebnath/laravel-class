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

// Route::get('/' , 'App\Http\Controllers\HomeController@index');
// Route::get('/home' , 'App\Http\Controllers\HomeController@index')->name('home');
// Route::get('/about' , 'App\Http\Controllers\HomeController@about')->name('about');
// Route::get('/contact' , 'App\Http\Controllers\HomeController@contact')->name('contact');
// Route::post('/contact-submit' , 'App\Http\Controllers\HomeController@contact_submit');


Route::get('/admin', function () {
    return view('admin.dashboard');
});

// For category route 
Route::get('/admin/all-category', 'App\Http\Controllers\Admin\CategoryController@index')->name('all_category');
Route::get('/admin/add-category', 'App\Http\Controllers\Admin\CategoryController@create')->name('category_add');

