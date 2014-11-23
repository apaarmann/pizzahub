<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});

// -------- Login Routes --------
Route::get('login', function()
{
    if (Auth::check()) {
        return Redirect::to('order');
    }
    return View::make('login');
});

Route::post('login', function()
{
    $credentials = Input::only('username', 'password');
    if (Auth::attempt($credentials)) {
        return Redirect::intended('order');
    }
    return View::make('login')->with('message', 'Login failed!');
});

// -------- Logout Routes --------
Route::get('logout', function()
{
    if (Auth::check()) {
        Auth::logout();
    }

    return Redirect::to('/');
});

// -------- Register Routes --------
Route::get('register', function()
{
    return View::make('register');
});

Route::post('register', 'CustomerController@register');

// -------- Order Routes --------
Route::get('order', array('before' => 'auth', function()
{
    return View::make('order');
}));

Route::post('order', array('before' => 'auth', 'uses' => 'CustomerController@addPizzaOrder'));