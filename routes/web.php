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
Route::post('/admin/store-category', 'App\Http\Controllers\Admin\CategoryController@store')->name('category_store');

Route::get('/admin/edit-category/{id}', 'App\Http\Controllers\Admin\CategoryController@edit')->name('category_edit');
Route::post('/admin/delete-category', 'App\Http\Controllers\Admin\CategoryController@delete')->name('category_delete');

Route::post('/admin/update-category', 'App\Http\Controllers\Admin\CategoryController@update')->name('category_update');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
