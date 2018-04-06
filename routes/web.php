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



Auth::routes();


Route::middleware([
    'auth',
])->group(function () {
    Route::get('/admin', 'AdminController@home');
    Route::any('/admin/registrations', 'AdminController@registrations');
    Route::any('/admin/event-create', 'AdminController@eventCreate');
    Route::any('/admin/event-edit/{id}', 'AdminController@eventEdit');

    // Events
    Route::resource('/api/events', 'EventRegistrationController');
});

Route::middleware([
    'auth',
    'role:admin'
])->group(function () {
    Route::get('/admin/users', 'AdminController@users');
    Route::post('/admin/users', 'AdminController@addUser');
    Route::get('/admin/login/{id}', 'AdminController@login');
});

Route::post('/register', 'AppController@register');

// Custom site routes
Route::get('/', 'AppController@home');
Route::get('/{page}', 'AppController@page');

// Markers
Route::resource('/api/markers', 'MarkerController');


// Logout route
Route::get('/admin/logout', '\App\Http\Controllers\Auth\LoginController@logout');

