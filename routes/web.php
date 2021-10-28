<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
//     return view('guest.home');
// });

// ['register' => false]
Auth::routes();

Route::middleware('auth')->name('admin.')->prefix('admin')->namespace('Admin')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/roles', 'RoleController@index')->name('roles.index');
    Route::get('/roles/{role}/edit', 'RoleController@edit')->name('roles.edit');
    Route::patch('/roles/{role}', 'RoleController@update')->name('roles.update');
    Route::resource('/posts', 'PostController');
    Route::resource('/categories', 'CategoryController');
    Route::get('/{any}', function () {
        return abort(404);
    });
});

Route::get('{any?}', function () {
    return view('guest.home');
})->where('any', '.*');
