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

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();

Route::prefix('')->middleware('auth')->group(function () {
    Route::get('/', function () {
       return redirect(route('dashboard'));
    });

    Route::name('dashboard')->get('/dashboard', 'DashboardController@index');	

	Route::prefix('')->middleware('user')->group(function () {
	   Route::name('add-item')->post('/add-item', 'DashboardController@addItem');	
	});

	Route::prefix('')->middleware('manager')->group(function () {
	   Route::name('answered-item')->post('/answered-item', 'DashboardController@answeredItem');	
	});   
});

