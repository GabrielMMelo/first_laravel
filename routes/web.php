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
    return view('layouts.welcome');
});

Route::group(["prefix" => "form"], function(){

	Route::get('/', 'formController@view')->name('form.view');

	Route::post('store', 'formController@store')->name('form.store');
});

/*
 * Views com variáveis
 *
Route::get('/{id}', function($id) {
	return view('layouts.postId')
		->with('id', $id);
});

*/
